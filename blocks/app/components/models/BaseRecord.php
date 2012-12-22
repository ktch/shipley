<?php
namespace Blocks;

/**
 * Blocks by Pixel & Tonic
 *
 * @package   Blocks
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */

/**
 * Active Record base class
 *
 * @abstract
 */
abstract class BaseRecord extends \CActiveRecord
{
	const RESTRICT = 'RESTRICT';
	const CASCADE = 'CASCADE';
	const NO_ACTION = 'NO ACTION';
	const SET_DEFAULT = 'SET DEFAULT';
	const SET_NULL = 'SET NULL';

	/**
	 * Constructor
	 * @param string $scenario
	 */
	function __construct($scenario = 'insert')
	{
		// If Blocks isn't installed, this model's table won't exist yet,
		// so just create an instance of the class, for use by the installer
		if ($scenario !== 'install')
		{
			parent::__construct($scenario);
		}
	}

	/**
	 * Init
	 */
	public function init()
	{
		ModelHelper::populateAttributeDefaults($this);

		$this->attachEventHandler('onAfterFind', array($this, 'prepAttributesForUse'));
		$this->attachEventHandler('onBeforeSave', array($this, 'prepAttributesForSave'));
		$this->attachEventHandler('onAfterSave', array($this, 'prepAttributesForUse'));
	}

	/**
	 * Returns the name of the associated database table.
	 *
	 * @abstract
	 * @return string
	 */
	abstract public function getTableName();

	/**
	 * Defines this model's attributes.
	 *
	 * @return array
	 */
	public function defineAttributes()
	{
		return array();
	}

	/**
	 * Defines this model's relations to other models.
	 *
	 * @return array
	 */
	public function defineRelations()
	{
		return array();
	}

	/**
	 * Defines this model's database table indexes.
	 *
	 * @return array
	 */
	public function defineIndexes()
	{
		return array();
	}

	/**
	 * Prepares the model's attribute values to be saved to the database.
	 *
	 * @return null
	 */
	public function prepAttributesForSave()
	{
		$attributes = $this->defineAttributes();
		$attributes['dateUpdated'] = array('0' => AttributeType::DateTime, 'required' => true);
		$attributes['dateCreated'] = array('0' => AttributeType::DateTime, 'required' => true);

		foreach ($attributes as $name => $config)
		{
			$config = ModelHelper::normalizeAttributeConfig($config);
			$value = $this->getAttribute($name);

			$this->setAttribute($name, ModelHelper::packageAttributeValue($config, $value, true));
		}

		// Populate dateCreated and uid if this is a new record
		if ($this->isNewRecord())
		{
			$this->dateCreated = DateTimeHelper::currentTimeForDb();
			$this->uid = StringHelper::UUID();
		}

		// Update the dateUpdated
		$this->dateUpdated = DateTimeHelper::currentTimeForDb();
	}

	/**
	 * Return the attribute values to the formats we want to work with in the code.
	 *
	 * @return null
	 */
	public function prepAttributesForUse()
	{
		$attributes = $this->defineAttributes();
		$attributes['dateUpdated'] = array('0' => AttributeType::DateTime, 'required' => true);
		$attributes['dateCreated'] = array('0' => AttributeType::DateTime, 'required' => true);

		foreach ($attributes as $name => $config)
		{
			$config = ModelHelper::normalizeAttributeConfig($config);
			$value = $this->getAttribute($name);

			switch ($config['type'])
			{
				case AttributeType::DateTime:
				{
					if ($value)
					{
						if (DateTimeHelper::isValidTimeStamp($value))
						{
							$dateTime = new DateTime('@'.$value);
						}
						else
						{
							// TODO: MySQL specific.
							$dateTime = DateTime::createFromFormat(DateTime::MYSQL_DATETIME, $value);
						}

						$this->setAttribute($name, $dateTime);
					}
					break;
				}
				case AttributeType::Mixed:
				{
					if (!empty($value) && is_string($value))
					{
						$this->setAttribute($name, JsonHelper::decode($value));
					}
					else
					{
						$this->setAttribute($name, array());
					}

					break;
				}
			}
		}
	}

	/**
	 * @return array
	 */
	public function scopes()
	{
		$scopes = array();

		// Add ordered() scope if this model has a sortOrder attribute
		$attributes = $this->defineAttributes();

		if (isset($attributes['sortOrder']))
		{
			$scopes['ordered'] = array('order' => 'sortOrder');
		}

		return $scopes;
	}

	/**
	 * Creates the model's table
	 */
	public function createTable()
	{
		$table = $this->getTableName();
		$indexes = $this->defineIndexes();
		$columns = array();

		// Add any Foreign Key columns
		foreach ($this->getBelongsToRelations() as $name => $config)
		{
			$required = !empty($config['required']);
			$columns[$config[2]] = array('column' => ColumnType::Int, 'required' => $required);

			// Add unique index for this column?
			// (foreign keys already get indexed, so we're only concerned with whether it should be unique)
			if (!empty($config['unique']))
			{
				$indexes[] = array('columns' => array($config[2]), 'unique' => true);
			}
		}

		// Add all other columns
		foreach ($this->defineAttributes() as $name => $config)
		{
			$config = ModelHelper::normalizeAttributeConfig($config);

			// Add (unique) index for this column?
			$indexed = !empty($config['indexed']);
			$unique = !empty($config['unique']);

			if ($unique || $indexed)
			{
				$indexes[] = array('columns' => array($name), 'unique' => $unique);
			}

			$columns[$name] = $config;
		}

		// Create the table
		blx()->db->createCommand()->createTable($table, $columns);

		// Create the indexes
		foreach ($indexes as $index)
		{
			$columns = ArrayHelper::stringToArray($index['columns']);
			$unique = !empty($index['unique']);
			$name = "{$table}_".implode('_', $columns).($unique ? '_unique' : '').'_idx';
			blx()->db->createCommand()->createIndex($name, $table, implode(',', $columns), $unique);
		}
	}

	/**
	 * Returns the BELONGS_TO relations.
	 *
	 * @return array
	 */
	public function getBelongsToRelations()
	{
		$belongsTo = array();

		foreach ($this->defineRelations() as $name => $config)
		{
			if ($config[0] == static::BELONGS_TO)
			{
				$this->_normalizeRelation($name, $config);
				$belongsTo[$name] = $config;
			}
		}
		return $belongsTo;
	}

	/**
	 * Drops the model's table
	 */
	public function dropTable()
	{
		$table = $this->getTableName();

		// Does the table exist?
		if (blx()->db->getSchema()->getTable('{{'.$table.'}}'))
		{
			blx()->db->createCommand()->dropTable($table);
		}
	}

	/**
	 * Adds foreign keys to the model's table
	 */
	public function addForeignKeys()
	{
		$table = $this->getTableName();

		foreach ($this->getBelongsToRelations() as $name => $config)
		{
			$otherModel = new $config[1];
			$otherTable = $otherModel->getTableName();
			$fkName = "{$table}_{$name}_fk";

			if (isset($config['onDelete']))
			{
				$onDelete = $config['onDelete'];
			}
			else
			{
				if (empty($config['required']))
				{
					$onDelete = static::SET_NULL;
				}
				else
				{
					$onDelete = null;
				}
			}

			blx()->db->createCommand()->addForeignKey($fkName, $table, $config[2], $otherTable, 'id', $onDelete);
		}
	}

	/**
	 * Drops the foreign keys from the model's table
	 */
	public function dropForeignKeys()
	{
		$table = $this->getTableName();

		// Does the table exist?
		if (blx()->db->getSchema()->getTable('{{'.$table.'}}'))
		{
			foreach ($this->getBelongsToRelations() as $name => $config)
			{
				$otherModel = new $config[1];
				$otherTable = $otherModel->getTableName();

				// Does the other table exist?
				if (blx()->db->getSchema()->getTable('{{'.$otherTable.'}}'))
				{
					$fkName = "{$table}_{$name}_fk";
					blx()->db->createCommand()->dropForeignKey($fkName, $table);
				}
			}
		}
	}

	// Rename a couple CActiveRecord functions

	/**
	 * @return bool
	 */
	public function isNewRecord()
	{
		return $this->getIsNewRecord();
	}

	/**
	 * @param        $id
	 * @param string $condition
	 * @param array  $params
	 * @return \CActiveRecord
	 */
	public function findById($id, $condition = '', $params = array())
	{
		return $this->findByPk($id, $condition, $params);
	}

	// CModel and CActiveRecord methods

	/**
	 * Returns an instance of the specified model
	 * @static
	 * @param string $class
	 * @return \CActiveRecord|object The model instance
	 */
	public static function model($class = __CLASS__)
	{
		return parent::model(get_called_class());
	}

	/**
	 * Returns the name of the associated database table.
	 *
	 * @return string
	 */
	public function tableName()
	{
		return '{{'.$this->getTableName().'}}';
	}

	/**
	 * Returns this model's validation rules.
	 *
	 * @return array
	 */
	public function rules()
	{
		return ModelHelper::getRules($this);
	}

	/**
	 * Returns the attribute labels.
	 *
	 * @return array
	 */
	public function attributeLabels()
	{
		return ModelHelper::getAttributeLabels($this);
	}

	/**
	 * Declares the related models.
	 *
	 * @return array
	 */
	public function relations()
	{
		$relations = $this->defineRelations();

		foreach ($relations as $name => &$config)
		{
			$this->_normalizeRelation($name, $config);

			// Unset any keys that CActiveRecord isn't expecting
			unset($config['required'], $config['unique'], $config['onDelete']);
		}

		return $relations;
	}

	/**
	 * Normalizes a relation's config
	 *
	 * @param string $name
	 * @param array &$config
	 */
	private function _normalizeRelation($name, &$config)
	{
		// Add the namespace to the class name
		if (strpos($config[1], '\\') === false)
		{
			$config[1] = __NAMESPACE__.'\\'.$config[1];
		}

		switch ($config[0])
		{
			case static::BELONGS_TO:
			{
				// Ad the foreign key
				if (empty($config[2]))
				{
					array_splice($config, 2, 0, $name.'Id');
				}
				break;
			}

			case static::MANY_MANY:
			{
				$config[2] = blx()->db->tablePrefix.$config[2];
				break;
			}
		}
	}

	/**
	 * Adds search criteria based on this model's attributes.
	 *
	 * @return \CActiveDataProvider
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that should not be searched.
		$criteria = new \CDbCriteria;

		foreach (array_keys($this->defineAttributes()) as $name)
		{
			$criteria->compare($name, $this->$name);
		}

		return new \CActiveDataProvider($this, array(
			'criteria' => $criteria
		));
	}

	/**
	 * Sets the named attribute value.
	 * You may also use $this->AttributeName to set the attribute value.
	 *
	 * @param string $name the attribute name
	 * @param mixed $value the attribute value.
	 * @return boolean whether the attribute exists and the assignment is conducted successfully
	 * @see hasAttribute
	 */
	public function setAttribute($name, $value)
	{
		// If value is valid timestamp and the underlying column type is datetime, convert to datetime object
		if (DateTimeHelper::isValidTimeStamp($value))
		{
			$table = blx()->db->schema->getTable("{{{$this->getTableName()}}}");
			$column = $table->getColumn($name);
			if ($column->dbType == ColumnType::DateTime)
			{
				$dt = new DateTime('@'.$value);
				$value = $dt;
			}
		}

		if (property_exists($this, $name))
		{
			$this->$name = $value;
		}
		else if (isset($this->getMetaData()->columns[$name]))
		{
			$this->_attributes[$name] = $value;
		}
		else
		{
			return false;
		}

		return true;
	}
}
