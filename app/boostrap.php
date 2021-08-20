<?php
// This would require all the necessary component

// Load Config
require_once 'config/config.php';
/*
 * Handled with autoloader
 */

// Autoload Core Libraries
spl_autoload_register(function ($className) {
	require_once "libraries/{$className}.php";
});