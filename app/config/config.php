<?php

// DATABASE DETAILS CONSTANT
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'prueba');
define('DB_CHAR', 'utf8mb4');

// APP ROOT
define('APP_ROOT', dirname(dirname(__FILE__)));

// URL ROOT e.g http://example.com/
$rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
define("URL_ROOT", $rootUrl);

// SITE NAME e.g example
$hostname = getenv('SERVER_NAME');
$cleanup = explode('.', $hostname);
define("SITE_NAME", $cleanup[0]);
