<?php

spl_autoload_register(function($name){
	$path = '../' . str_replace('\\', DIRECTORY_SEPARATOR, $name) . '.php';

	if(file_exists($path)){
		include_once $path;
	}
});
