<?php
	require 'config.php';
	session_start();
	
	//Library
	require 'library/Request.php';
	require 'library/Inflector.php';
	require 'library/View.php';

	define("ROOT_DIR", Inflector::routeAdapter(__DIR__));
	
	$url = (empty($_GET["url"]))? "" : $_GET["url"];
	
	$request = new Request($url);
	$request->execute();