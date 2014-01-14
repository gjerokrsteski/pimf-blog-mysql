<?php
/*
|--------------------------------------------------------------------------
| PIMF Application gateway/runner
|--------------------------------------------------------------------------
*/
require_once 'app/bootstrap.app.php';

use \Pimf\Application as App;

App::run($_GET, $_POST, $_COOKIE);

App::finish();