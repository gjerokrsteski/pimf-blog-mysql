<?php
/*
|--------------------------------------------------------------------------
| PIMF bootstrap
|--------------------------------------------------------------------------
*/
$root = dirname(dirname(__FILE__));

$config = include_once $root.'/app/config.app.php';

require_once $root.'/pimf-framework/autoload.core.php';
require_once $root.'/app/autoload.app.php';
require_once $root.'/pimf-framework/utils.php';

use \Pimf\Application as App;

App::bootstrap($config, $_SERVER);
