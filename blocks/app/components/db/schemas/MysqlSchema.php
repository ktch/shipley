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
 *
 */
class MysqlSchema extends \CMysqlSchema
{
	/**
	 * @param $table
	 * @param $column
	 * @param $type
	 * @return string
	 */
	public function addColumnFirst($table, $column, $type)
	{
		$type = $this->getColumnType($type);

		$sql = 'ALTER TABLE '.$this->quoteTableName($table)
		       .' ADD '.$this->quoteColumnName($column).' '
		       .$this->getColumnType($type).' '
		       .'FIRST';

		return $sql;
	}

	/**
	 * @param $table
	 * @param $column
	 * @param $type
	 * @param $after
	 * @return string
	 */
	public function addColumnAfter($table, $column, $type, $after)
	{
		$type = $this->getColumnType($type);

		$sql = 'ALTER TABLE '.$this->quoteTableName($table)
		       .' ADD '.$this->quoteColumnName($column).' '
		       .$this->getColumnType($type).' '
		       .'AFTER '.$this->quoteTableName($after);

		return $sql;
	}

	/**
	 * @param $table
	 * @param $column
	 * @param $type
	 * @param $before
	 * @return string
	 */
	public function addColumnBefore($table, $column, $type, $before)
	{
		$tableInfo = $this->getTable($table, true);
		$columns = array_keys($tableInfo->columns);
		$beforeIndex = array_search($before, $columns);

		if ($beforeIndex === false)
		{
			return $this->addColumn($table, $column, $type);
		}
		else if ($beforeIndex > 0)
		{
			$after = $columns[$beforeIndex-1];
			return $this->addColumnAfter($table, $column, $type, $after);
		}
		else
		{
			return $this->addColumnFirst($table, $column, $type);
		}
	}

	/**
	 * @param string $table
	 * @param string $column
	 * @param string $type
	 * @param mixed $newName
	 * @param mixed $after
	 * @return string
	 */
	public function alterColumn($table, $column, $type, $newName = null, $after = null)
	{
		if (!$newName)
		{
			$newName = $column;
		}

		return 'ALTER TABLE ' . $this->quoteTableName($table) . ' CHANGE '
			. $this->quoteColumnName($column) . ' '
			. $this->quoteColumnName($newName) . ' '
			. $this->getColumnType($type)
			. ($after ? ' AFTER '.$this->quoteColumnName($after) : '');
	}

	/**
	 * @param $table
	 * @param $columns
	 * @param $vals
	 * @return mixed
	 */
	public function insertAll($table, $columns, $vals)
	{
		$params = array();
		$names = array();
		$placeHolders = array();

		// parameterize the parameters
		$uniqueCounter = 0;

		foreach ($vals as $val)
		{
			for ($columnCounter = 0; $columnCounter < count($columns); $columnCounter++)
			{
				$placeHolders[] = ':'.$columns[$columnCounter].($uniqueCounter + 1);
				$params[':' . $columns[$columnCounter].($uniqueCounter + 1)] = $val[$columnCounter];

			}

			$uniqueCounter++;
		}

		foreach ($columns as $columnName)
		{
			$names[] = $this->quoteColumnName($columnName);
		}

		// generate the SQL
		$sql='INSERT INTO '.$this->quoteTableName($table).' ('.implode(', ', $names).') VALUES (';

		$columnCounter = 0;
		foreach ($placeHolders as $placeHolder)
		{
			if ($columnCounter == count($names))
			{
				$columnCounter = 0;
				$sql = rtrim($sql, ',');
				$sql .= '), (';
			}

			$sql .= $placeHolder.',';
			$columnCounter++;
		}

		$sql = rtrim($sql, ',');
		$sql .= ')';

		return array('query' => $sql, 'params' => $params);
	}

	/**
	 * @param string $table
	 * @param array  $columns
	 * @param null   $options
	 * @return string
	 */
	public function createTable($table, $columns, $options = null)
	{
		$cols = array();
		$options = 'ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci'.($options ? ' '.$options : '');

		foreach ($columns as $name => $type)
		{
			if (is_string($name))
			{
				$cols[] = "\t".$this->quoteColumnName($name).' '.$this->getColumnType($type);
			}
			else
			{
				$cols[] = "\t".$type;
			}
		}

		$sql = "CREATE TABLE ".$this->quoteTableName($table)." (\n".implode(",\n", $cols)."\n)";

		return $options === null ? $sql : $sql.' '.$options;
	}
}
