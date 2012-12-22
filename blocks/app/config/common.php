<?php

/**
 * Blocks by Pixel & Tonic
 *
 * @package   Blocks
 * @author    Pixel & Tonic, Inc.
 * @copyright Copyright (c) 2012, Pixel & Tonic, Inc.
 * @license   http://blockscms.com/license1.0.html Blocks License
 * @link      http://blockscms.com
 */

// Load the configs
$blocksConfig = require_once(BLOCKS_APP_PATH.'config/defaults/blocks.php');
$dbConfig = require_once(BLOCKS_APP_PATH.'config/defaults/db.php');

if (is_array($_blocksConfig = require_once(BLOCKS_CONFIG_PATH.'blocks.php')))
{
	$blocksConfig = array_merge($blocksConfig, $_blocksConfig);
}

if (is_array($_dbConfig = require_once(BLOCKS_CONFIG_PATH.'db.php')))
{
	$dbConfig = array_merge($dbConfig, $_dbConfig);
}

if ($blocksConfig['devMode'] == true)
{
	defined('YII_DEBUG') || define('YII_DEBUG', true);
	error_reporting(E_ALL & ~E_STRICT);
	ini_set('display_errors', 1);
	ini_set('log_errors', 1);
	ini_set('error_log', BLOCKS_STORAGE_PATH.'logs/phperrors.log');
}
else
{
	error_reporting(0);
	ini_set('display_errors', 0);
}

// Table prefixes cannot be longer than 5 characters
$tablePrefix = rtrim($dbConfig['tablePrefix'], '_');
if ($tablePrefix)
{
	if (strlen($tablePrefix) > 5)
	{
		$tablePrefix = substr($tablePrefix, 0, 5);
	}

	$tablePrefix .= '_';
}

$packages = explode(',', BLOCKS_PACKAGES);

$configArray = array(

	// autoloading model and component classes
	'import' => array(
		'application.framework.cli.commands.*',
		'application.framework.console.*',
		'application.framework.logging.CLogger',
	),

	'componentAliases' => array(
		'app.components.accounts.controllers.AccountsController',
		'app.components.accounts.enums.InvalidLoginMode',
		'app.components.accounts.enums.UserStatus',
		'app.components.accounts.models.AccountSettingsModel',
		'app.components.accounts.models.PasswordModel',
		'app.components.accounts.models.UserModel',
		'app.components.accounts.models.UsernameModel',
		'app.components.accounts.records.UserRecord',
		'app.components.accounts.services.AccountsService',
		'app.components.assets.BaseAssetSourceType',
		'app.components.assets.assetsourcetypes.LocalAssetSourceType',
		'app.components.assets.controllers.AssetOperationsController',
		'app.components.assets.controllers.AssetSizesController',
		'app.components.assets.controllers.AssetSourcesController',
		'app.components.assets.controllers.AssetsController',
		'app.components.assets.helpers.AssetsHelper',
		'app.components.assets.linktypes.AssetLinkType',
		'app.components.assets.models.AssetBlockModel',
		'app.components.assets.models.AssetFileModel',
		'app.components.assets.models.AssetFolderModel',
		'app.components.assets.models.AssetIndexDataModel',
		'app.components.assets.models.AssetOperationResponseModel',
		'app.components.assets.models.AssetSizeModel',
		'app.components.assets.models.AssetSourceModel',
		'app.components.assets.records.AssetBlockRecord',
		'app.components.assets.records.AssetContentRecord',
		'app.components.assets.records.AssetFileRecord',
		'app.components.assets.records.AssetFolderRecord',
		'app.components.assets.records.AssetIndexDataRecord',
		'app.components.assets.records.AssetSizeRecord',
		'app.components.assets.records.AssetSourceRecord',
		'app.components.assets.services.AssetIndexingService',
		'app.components.assets.services.AssetSizesService',
		'app.components.assets.services.AssetSourcesService',
		'app.components.assets.services.AssetsService',
		'app.components.assets.services.criteria.FileCriteria',
		'app.components.assets.services.criteria.FolderCriteria',
		'app.components.assets.variables.AssetSourceTypeVariable',
		'app.components.assets.variables.AssetsVariable',
		'app.components.blocks.BaseBlockModel',
		'app.components.blocks.BaseBlockRecord',
		'app.components.blocks.BaseBlockType',
		'app.components.blocks.BaseOptionsBlockType',
		'app.components.blocks.blocktypes.CheckboxesBlockType',
		'app.components.blocks.blocktypes.DropdownBlockType',
		'app.components.blocks.blocktypes.MultiSelectBlockType',
		'app.components.blocks.blocktypes.NumberBlockType',
		'app.components.blocks.blocktypes.PlainTextBlockType',
		'app.components.blocks.blocktypes.RadioButtonsBlockType',
		'app.components.blocks.blocktypes.RichTextBlockType',
		'app.components.blocks.services.BlockTypesService',
		'app.components.blocks.variables.BlockTypeVariable',
		'app.components.blocks.variables.BlockTypesVariable',
		'app.components.config.services.ConfigService',
		'app.components.config.variables.ConfigVariable',
		'app.components.content.controllers.EntriesController',
		'app.components.content.controllers.GlobalsController',
		'app.components.content.controllers.PagesController',
		'app.components.content.linktypes.EntryLinkType',
		'app.components.content.models.EntryBlockModel',
		'app.components.content.models.EntryModel',
		'app.components.content.models.EntryTagModel',
		'app.components.content.models.GlobalBlockModel',
		'app.components.content.models.GlobalContentModel',
		'app.components.content.models.PageBlockModel',
		'app.components.content.models.PageModel',
		'app.components.content.records.EntryBlockRecord',
		'app.components.content.records.EntryContentRecord',
		'app.components.content.records.EntryRecord',
		'app.components.content.records.EntryTagEntryRecord',
		'app.components.content.records.EntryTagRecord',
		'app.components.content.records.EntryTitleRecord',
		'app.components.content.records.GlobalBlockRecord',
		'app.components.content.records.GlobalContentRecord',
		'app.components.content.records.PageBlockRecord',
		'app.components.content.records.PageContentRecord',
		'app.components.content.records.PageRecord',
		'app.components.content.services.EntriesService',
		'app.components.content.services.GlobalsService',
		'app.components.content.services.PagesService',
		'app.components.content.services.criteria.EntryCriteria',
		'app.components.content.variables.EntryBlocksVariable',
		'app.components.content.variables.GlobalsVariable',
		'app.components.content.variables.PagesVariable',
		'app.components.content.widgets.QuickPostWidget',
		'app.components.content.widgets.RecentEntriesWidget',
		'app.components.core.BaseApplicationComponent',
		'app.components.core.BaseComponent',
		'app.components.core.BaseComponentModel',
		'app.components.core.BaseComponentVariable',
		'app.components.core.BaseController',
		'app.components.core.BaseCriteria',
		'app.components.core.BaseEntityController',
		'app.components.core.BaseEntityService',
		'app.components.core.enums.BlocksPackage',
		'app.components.core.enums.ComponentType',
		'app.components.core.enums.LicenseKeyStatus',
		'app.components.core.exceptions.Exception',
		'app.components.core.helpers.AppHelper',
		'app.components.core.helpers.ArrayHelper',
		'app.components.core.helpers.HtmlHelper',
		'app.components.core.helpers.JsonHelper',
		'app.components.core.helpers.NumberHelper',
		'app.components.core.helpers.PathHelper',
		'app.components.core.helpers.StringHelper',
		'app.components.core.helpers.VariableHelper',
		'app.components.core.models.LicenseKeyModel',
		'app.components.core.records.InfoRecord',
		'app.components.core.services.ComponentsService',
		'app.components.core.services.PathService',
		'app.components.core.variables.AppVariable',
		'app.components.core.variables.BlxVariable',
		'app.components.cp.variables.CpVariable',
		'app.components.dashboard.BaseWidget',
		'app.components.dashboard.controllers.DashboardController',
		'app.components.dashboard.helpers.DashboardHelper',
		'app.components.dashboard.models.WidgetModel',
		'app.components.dashboard.records.WidgetRecord',
		'app.components.dashboard.services.DashboardService',
		'app.components.dashboard.variables.DashboardVariable',
		'app.components.dashboard.variables.WidgetTypeVariable',
		'app.components.dashboard.widgets.FeedWidget',
		'app.components.dashboard.widgets.GetHelpWidget',
		'app.components.datetime.DateInterval',
		'app.components.datetime.DateTime',
		'app.components.datetime.helpers.DateTimeHelper',
		'app.components.datetime.validators.DateTimeValidator',
		'app.components.db.DbBackup',
		'app.components.db.DbCommand',
		'app.components.db.DbConnection',
		'app.components.db.PDO',
		'app.components.db.enums.ColumnType',
		'app.components.db.helpers.DbHelper',
		'app.components.db.schemas.MysqlSchema',
		'app.components.email.enums.EmailerType',
		'app.components.email.services.EmailService',
		'app.components.errors.ErrorHandler',
		'app.components.et.ElliottEndPoints',
		'app.components.et.Et',
		'app.components.et.enums.PtAccountCredentialStatus',
		'app.components.et.models.EtModel',
		'app.components.et.services.EtService',
		'app.components.http.UrlManager',
		'app.components.http.exceptions.HttpException',
		'app.components.http.helpers.UrlHelper',
		'app.components.http.services.HttpRequestService',
		'app.components.http.services.HttpSessionService',
		'app.components.http.variables.HttpRequestVariable',
		'app.components.i18n.Locale',
		'app.components.i18n.PhpMessageSource',
		'app.components.i18n.helpers.LocalizationHelper',
		'app.components.i18n.services.LocalizationService',
		'app.components.i18n.validators.LanguageValidator',
		'app.components.i18n.validators.LocaleNumberValidator',
		'app.components.i18n.variables.LocalizationVariable',
		'app.components.install.Requirement',
		'app.components.install.RequirementsChecker',
		'app.components.install.controllers.InstallController',
		'app.components.install.enums.InstallStatus',
		'app.components.install.enums.RequirementResult',
		'app.components.install.services.InstallService',
		'app.components.io.BaseIO',
		'app.components.io.File',
		'app.components.io.Folder',
		'app.components.io.PclZip',
		'app.components.io.Zip',
		'app.components.io.ZipArchive',
		'app.components.io.helpers.IOHelper',
		'app.components.io.interfaces.IZip',
		'app.components.links.BaseLinkType',
		'app.components.links.blocktypes.LinksBlockType',
		'app.components.links.controllers.LinksController',
		'app.components.links.models.LinkModel',
		'app.components.links.records.LinkCriteriaRecord',
		'app.components.links.records.LinkRecord',
		'app.components.links.services.LinksService',
		'app.components.links.variables.LinkTypeVariable',
		'app.components.links.variables.LinksVariable',
		'app.components.logging.DbLogRoute',
		'app.components.logging.FileLogRoute',
		'app.components.logging.LogRouter',
		'app.components.logging.LoggingHelper',
		'app.components.logging.ProfileLogRoute',
		'app.components.logging.WebLogRoute',
		'app.components.models.BaseEntityModel',
		'app.components.models.BaseEntityRecord',
		'app.components.models.BaseModel',
		'app.components.models.BaseRecord',
		'app.components.models.enums.AttributeType',
		'app.components.models.helper.ModelHelper',
		'app.components.models.models.Model',
		'app.components.models.validators.CompositeUniqueValidator',
		'app.components.models.validators.HandleValidator',
		'app.components.models.validators.UrlValidator',
		'app.components.plugins.BasePlugin',
		'app.components.plugins.controllers.PluginsController',
		'app.components.plugins.records.PluginRecord',
		'app.components.plugins.services.PluginsService',
		'app.components.plugins.variables.PluginVariable',
		'app.components.plugins.variables.PluginsVariable',
		'app.components.resources.Image',
		'app.components.resources.services.ImagesService',
		'app.components.resources.services.ResourcesService',
		'app.components.resources.variables.ImageVariable',
		'app.components.routes.controllers.RoutesController',
		'app.components.routes.records.RouteRecord',
		'app.components.routes.services.RoutesService',
		'app.components.routes.variables.RoutesVariable',
		'app.components.security.services.SecurityService',
		'app.components.state.StatePersister',
		'app.components.systemsettings.controllers.SystemSettingsController',
		'app.components.systemsettings.models.EmailSettingsModel',
		'app.components.systemsettings.models.GeneralSettingsModel',
		'app.components.systemsettings.models.SiteSettingsModel',
		'app.components.systemsettings.records.SystemSettingsRecord',
		'app.components.systemsettings.services.SystemSettingsService',
		'app.components.systemsettings.variables.SystemSettingsVariable',
		'app.components.templates.StringTemplate',
		'app.components.templates.controllers.TemplatesController',
		'app.components.templates.exceptions.TemplateLoaderException',
		'app.components.templates.helpers.TemplateHelper',
		'app.components.templates.services.TemplatesService',
		'app.components.templates.twigextensions.BlocksTwigExtension',
		'app.components.templates.twigextensions.Exit_Node',
		'app.components.templates.twigextensions.Exit_TokenParser',
		'app.components.templates.twigextensions.IncludeResource_Node',
		'app.components.templates.twigextensions.IncludeResource_TokenParser',
		'app.components.templates.twigextensions.IncludeTranslations_Node',
		'app.components.templates.twigextensions.IncludeTranslations_TokenParser',
		'app.components.templates.twigextensions.Paginate_Node',
		'app.components.templates.twigextensions.Paginate_TokenParser',
		'app.components.templates.twigextensions.Redirect_Node',
		'app.components.templates.twigextensions.Redirect_TokenParser',
		'app.components.templates.twigextensions.RequireLogin_Node',
		'app.components.templates.twigextensions.RequireLogin_TokenParser',
		'app.components.templates.twigextensions.RequirePermission_Node',
		'app.components.templates.twigextensions.RequirePermission_TokenParser',
		'app.components.templates.twigextensions.TemplateLoader',
		'app.components.updates.AppUpdater',
		'app.components.updates.PluginUpdater',
		'app.components.updates.controllers.UpdateController',
		'app.components.updates.enums.PatchManifestFileAction',
		'app.components.updates.enums.PluginVersionUpdateStatus',
		'app.components.updates.enums.VersionUpdateStatus',
		'app.components.updates.helpers.UpdateHelper',
		'app.components.updates.interfaces.IUpdater',
		'app.components.updates.models.BlocksNewReleaseModel',
		'app.components.updates.models.BlocksUpdateModel',
		'app.components.updates.models.PluginNewReleaseModel',
		'app.components.updates.models.PluginUpdateModel',
		'app.components.updates.models.UpdateModel',
		'app.components.updates.services.MigrationsService',
		'app.components.updates.services.UpdatesService',
		'app.components.updates.variables.UpdatesVariable',
		'app.components.updates.widgets.UpdatesWidget',
		'app.components.usersession.UserIdentity',
		'app.components.usersession.services.UserSessionService',
		'app.components.usersession.variables.UserSessionVariable',

		),

	'components' => array(

		'db' => array(
			'connectionString'  => strtolower('mysql:host='.$dbConfig['server'].';dbname='.$dbConfig['database'].';port='.$dbConfig['port'].';'),
			'emulatePrepare'    => true,
			'username'          => $dbConfig['user'],
			'password'          => $dbConfig['password'],
			'charset'           => $dbConfig['charset'],
			'tablePrefix'       => $tablePrefix,
			'driverMap'         => array('mysql' => 'Blocks\MysqlSchema'),
			'class'             => 'Blocks\DbConnection',
			'pdoClass'          => 'Blocks\PDO',
		),

		'config' => array(
			'class' => 'Blocks\ConfigService',
		),

		'i18n' => array(
			'class' => 'Blocks\LocalizationService',
		),

		'formatter' => array(
			'class' => '\CFormatter'
		),
	),

	'params' => array(
		'adminEmail'            => 'brad@pixelandtonic.com',
		'dbConfig'              => $dbConfig,
		'blocksConfig'          => $blocksConfig,
	)
);

if (in_array('Rebrand', $packages))
{
	$configArray['componentAliases'] = array_merge($configArray['componentAliases'], array(
		'app.components.email.EmailMessagesService',
		'app.components.email.controllers.EmailMessagesController',
		'app.components.email.models.EmailMessageModel',
		'app.components.email.records.EmailMessageRecord',
		'app.components.email.variables.EmailMessagesVariable',
		'app.components.rebrand.controllers.RebrandController',
		'app.components.rebrand.variables.LogoVariable',
		'app.components.rebrand.variables.RebrandVariable',

	));
}

if (in_array('PublishPro', $packages))
{
	$configArray['componentAliases'] = array_merge($configArray['componentAliases'], array(
		'app.components.content.controllers.EntryRevisionsController',
		'app.components.content.controllers.SectionsController',
		'app.components.content.models.EntryDraftModel',
		'app.components.content.models.EntryVersionModel',
		'app.components.content.models.SectionModel',
		'app.components.content.records.EntryDraftRecord',
		'app.components.content.records.EntryVersionRecord',
		'app.components.content.records.SectionContentRecord',
		'app.components.content.records.SectionRecord',
		'app.components.content.services.EntryRevisionsService',
		'app.components.content.services.SectionsService',
		'app.components.content.services.criteria.SectionCriteria',
		'app.components.content.variables.EntryRevisionsVariable',

	));
}

if (in_array('Cloud', $packages))
{
	$configArray['componentAliases'] = array_merge($configArray['componentAliases'], array(
		'app.components.assets.assetsourcetypes.S3AssetSourceType',

	));
}

if (in_array('Language', $packages))
{
	$configArray['componentAliases'] = array_merge($configArray['componentAliases'], array(
		'app.components.systemsettings.controllers.LanguageSettingsController',

	));
}

if (in_array('Users', $packages))
{
	$configArray['componentAliases'] = array_merge($configArray['componentAliases'], array(
		'app.components.accounts.controllers.UserGroupsController',
		'app.components.accounts.controllers.UsersController',
		'app.components.accounts.linktypes.UserLinkType',
		'app.components.accounts.models.UserGroupModel',
		'app.components.accounts.models.UserProfileBlockModel',
		'app.components.accounts.records.UserGroupRecord',
		'app.components.accounts.records.UserGroup_UserRecord',
		'app.components.accounts.records.UserPermissionRecord',
		'app.components.accounts.records.UserPermission_UserGroupRecord',
		'app.components.accounts.records.UserPermission_UserRecord',
		'app.components.accounts.records.UserProfileBlockRecord',
		'app.components.accounts.records.UserProfileRecord',
		'app.components.accounts.services.UserGroupsService',
		'app.components.accounts.services.UserPermissionsService',
		'app.components.accounts.services.UsersService',
		'app.components.accounts.services.criteria.UserCriteria',
		'app.components.accounts.variables.UserGroupsVariable',
		'app.components.accounts.variables.UserPermissionsVariable',
		'app.components.accounts.variables.UserProfileBlocksVariable',

	));
}

// -------------------------------------------
//  CP routes
// -------------------------------------------

$cpRoutes['content']                                                          = 'content/entries/index';

$cpRoutes['content\/pages']                                                   = 'content/pages';
$cpRoutes['content\/pages\/new']                                              = 'content/pages/_edit/settings';
$cpRoutes['content\/pages\/(?P<pageId>\d+)']                                  = 'content/pages/_edit';
$cpRoutes['content\/pages\/(?P<pageId>\d+)\/settings']                        = 'content/pages/_edit/settings';
$cpRoutes['content\/pages\/(?P<pageId>\d+)\/blocks']                          = 'content/pages/_edit/blocks/index';
$cpRoutes['content\/pages\/(?P<pageId>\d+)\/blocks\/new']                     = 'content/pages/_edit/blocks/settings';
$cpRoutes['content\/pages\/(?P<pageId>\d+)\/blocks\/(?P<blockId>\d+)']        = 'content/pages/_edit/blocks/settings';

$cpRoutes['content\/globals']                                                 = 'content/globals/index';
$cpRoutes['content\/(?P<sectionHandle>{handle})\/new']                        = 'content/entries/_edit';
$cpRoutes['content\/(?P<sectionHandle>{handle})\/(?P<entryId>\d+)']           = 'content/entries/_edit';
$cpRoutes['content\/(?P<filter>{handle})']                                    = 'content/entries/index';

$cpRoutes['dashboard\/settings\/new']                                         = 'dashboard/settings/_widgetsettings';
$cpRoutes['dashboard\/settings\/(?P<widgetId>\d+)']                           = 'dashboard/settings/_widgetsettings';

$cpRoutes['updates\/go\/(?P<handle>[^\/]*)']                                  = 'updates/_go';

$cpRoutes['settings\/assets']                                                 = 'settings/assets/sources';
$cpRoutes['settings\/assets\/sources\/new']                                   = 'settings/assets/sources/_settings';
$cpRoutes['settings\/assets\/sources\/(?P<sourceId>\d+)']                     = 'settings/assets/sources/_settings';
$cpRoutes['settings\/assets\/sizes\/new']                                     = 'settings/assets/sizes/_settings';
$cpRoutes['settings\/assets\/sizes\/(?P<sizeHandle>{handle})']                = 'settings/assets/sizes/_settings';
$cpRoutes['settings\/assets\/blocks\/new']                                    = 'settings/assets/blocks/_settings';
$cpRoutes['settings\/assets\/blocks\/(?P<blockId>\d+)']                       = 'settings/assets/blocks/_settings';
$cpRoutes['settings\/globals\/new']                                           = 'settings/globals/_settings';
$cpRoutes['settings\/globals\/(?P<blockId>\d+)']                              = 'settings/globals/_settings';
$cpRoutes['settings\/pages\/new']                                             = 'settings/pages/_edit/settings';
$cpRoutes['settings\/pages\/(?P<pageId>\d+)']                                 = 'settings/pages/_edit/settings';
$cpRoutes['settings\/pages\/(?P<pageId>\d+)\/blocks']                         = 'settings/pages/_edit/blocks/index';
$cpRoutes['settings\/pages\/(?P<pageId>\d+)\/blocks\/new']                    = 'settings/pages/_edit/blocks/settings';
$cpRoutes['settings\/pages\/(?P<pageId>\d+)\/blocks\/(?P<blockId>\d+)']       = 'settings/pages/_edit/blocks/settings';
$cpRoutes['settings\/plugins\/(?P<pluginClass>{handle})']                     = 'settings/plugins/_settings';

$cpRoutes['myaccount']                                                        = 'users/_edit/account';

if (in_array('PublishPro', $packages))
{
	$cpRoutes['content\/(?P<sectionHandle>{handle})\/(?P<entryId>\d+)\/drafts\/(?P<draftId>\d+)']        = 'content/entries/_edit';
	$cpRoutes['content\/(?P<sectionHandle>{handle})\/(?P<entryId>\d+)\/versions\/(?P<versionId>\d+)']    = 'content/entries/_edit';

	$cpRoutes['settings\/sections\/new']                                          = 'settings/sections/_edit/settings';
	$cpRoutes['settings\/sections\/(?P<sectionId>\d+)']                           = 'settings/sections/_edit/settings';

	$cpRoutes['settings\/sections\/(?P<sectionId>\d+)\/blocks']                   = 'settings/sections/_edit/blocks';
	$cpRoutes['settings\/sections\/(?P<sectionId>\d+)\/blocks\/new']              = 'settings/sections/_edit/blocks/settings';
	$cpRoutes['settings\/sections\/(?P<sectionId>\d+)\/blocks\/(?P<blockId>\d+)'] = 'settings/sections/_edit/blocks/settings';
}
else
{
	$cpRoutes['settings\/blog\/blocks\/new']                                      = 'settings/sections/_edit/blocks/settings';
	$cpRoutes['settings\/blog\/blocks\/(?P<blockId>\d+)']                         = 'settings/sections/_edit/blocks/settings';
}

if (in_array('Users', $packages))
{
	$cpRoutes['myaccount\/profile']                                               = 'users/_edit/profile';
	$cpRoutes['myaccount\/info']                                                  = 'users/_edit/info';
	$cpRoutes['myaccount\/admin']                                                 = 'users/_edit/admin';

	$cpRoutes['users\/new']                                                       = 'users/_edit/account';
	$cpRoutes['users\/(?P<filter>{handle})']                                      = 'users';
	$cpRoutes['users\/(?P<userId>\d+)']                                           = 'users/_edit/account';
	$cpRoutes['users\/(?P<userId>\d+)\/profile']                                  = 'users/_edit/profile';
	$cpRoutes['users\/(?P<userId>\d+)\/admin']                                    = 'users/_edit/admin';
	$cpRoutes['users\/(?P<userId>\d+)\/info']                                     = 'users/_edit/info';

	$cpRoutes['settings\/users']                                                  = 'settings/users/groups';
	$cpRoutes['settings\/users\/groups\/new']                                     = 'settings/users/groups/_settings';
	$cpRoutes['settings\/users\/groups\/(?P<groupId>\d+)']                        = 'settings/users/groups/_settings';
	$cpRoutes['settings\/users\/blocks\/new']                                     = 'settings/users/blocks/_settings';
	$cpRoutes['settings\/users\/blocks\/(?P<blockId>\d+)']                        = 'settings/users/blocks/_settings';
}

// -------------------------------------------
//  Component config
// -------------------------------------------

$components['accounts']['class']          = 'Blocks\AccountsService';
$components['assets']['class']            = 'Blocks\AssetsService';
$components['assetSizes']['class']        = 'Blocks\AssetSizesService';
$components['assetIndexing']['class']     = 'Blocks\AssetIndexingService';
$components['assetSources']['class']      = 'Blocks\AssetSourcesService';
$components['blockTypes']['class']        = 'Blocks\BlockTypesService';
$components['components']['class']        = 'Blocks\ComponentsService';
$components['dashboard']['class']         = 'Blocks\DashboardService';
$components['email']['class']             = 'Blocks\EmailService';
$components['entries']['class']           = 'Blocks\EntriesService';
$components['et']['class']                = 'Blocks\EtService';
$components['globals']['class']           = 'Blocks\GlobalsService';
$components['install']['class']           = 'Blocks\InstallService';
$components['images']['class']            = 'Blocks\ImagesService';
$components['links']['class']             = 'Blocks\LinksService';
$components['migrations']['class']        = 'Blocks\MigrationsService';
$components['pages']['class']             = 'Blocks\PagesService';
$components['path']['class']              = 'Blocks\PathService';
$components['plugins']['class']           = 'Blocks\PluginsService';

$components['resources']['class']         = 'Blocks\ResourcesService';
$components['resources']['dateParam']     = 'd';

$components['routes']['class']            = 'Blocks\RoutesService';
$components['security']['class']          = 'Blocks\SecurityService';
$components['systemSettings']['class']    = 'Blocks\SystemSettingsService';
$components['templates']['class']         = 'Blocks\TemplatesService';
$components['updates']['class']           = 'Blocks\UpdatesService';

if (in_array('PublishPro', $packages))
{
	$components['entryRevisions']['class']    = 'Blocks\EntryRevisionsService';
	$components['sections']['class']          = 'Blocks\SectionsService';
}

if (in_array('Users', $packages))
{
	$components['users']['class']             = 'Blocks\UsersService';
	$components['userGroups']['class']        = 'Blocks\UserGroupsService';
	$components['userPermissions']['class']   = 'Blocks\UserPermissionsService';
}

if (in_array('Rebrand', $packages))
{
	$components['emailMessages']['class']     = 'Blocks\EmailMessagesService';
}

$components['file']['class'] = 'Blocks\File';
$components['messages']['class'] = 'Blocks\PhpMessageSource';
$components['request']['class'] = 'Blocks\HttpRequestService';
$components['request']['enableCookieValidation'] = true;
$components['viewRenderer']['class'] = 'Blocks\TemplateProcessor';
$components['statePersister']['class'] = 'Blocks\StatePersister';

$components['urlManager']['class'] = 'Blocks\UrlManager';
$components['urlManager']['cpRoutes'] = $cpRoutes;
$components['urlManager']['pathParam'] = 'p';

$components['assetManager']['basePath'] = dirname(__FILE__).'/../assets';
$components['assetManager']['baseUrl'] = '../../blocks/app/assets';

$components['errorHandler']['class'] = 'Blocks\ErrorHandler';

$components['fileCache']['class'] = 'CFileCache';

$components['log']['class'] = 'Blocks\LogRouter';
$components['log']['routes'] = array(
	array(
		'class'  => 'Blocks\FileLogRoute',
	),
	array(
		'class'         => 'Blocks\WebLogRoute',
		'filter'        => 'CLogFilter',
		'showInFireBug' => true,
	),
	array(
		'class'         => 'Blocks\ProfileLogRoute',
		'showInFireBug' => true,
	),
);

$components['session']['autoStart']   = true;
$components['session']['cookieMode']  = 'only';
$components['session']['class']       = 'Blocks\HttpSessionService';
$components['session']['sessionName'] = 'BlocksSessionId';

$components['user']['class'] = 'Blocks\UserSessionService';
$components['user']['allowAutoLogin']  = true;
$components['user']['loginUrl']        = $blocksConfig['loginPath'];
$components['user']['autoRenewCookie'] = true;

$configArray['components'] = array_merge($configArray['components'], $components);

return $configArray;
