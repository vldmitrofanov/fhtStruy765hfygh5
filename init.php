<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';
require_once 'config.php';
require_once 'filter.php';
require_once 'functions.php';
require_once 'ClassCurlPost.php';


if (!isset($_GET['app_secret']) || $_GET['app_secret'] != md5($appConfig['api_key_id'])) {
    die('ERROR: you are not authorized to access! You must provide \'app_secret\'');
}
