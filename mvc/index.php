<?php

//echo "<pre>";
//paverts i mazasias
// echo '<pre>';
// print_r($_SERVER);
//die();
$path = explode('/', $_SERVER['PATH_INFO']);

//echo '<pre>';
//print_r($path);
$classFile = '';
$errorFile = 'ErrorController';
include_once('controllers/' . $errorFile . '.php');
$object2 = new $errorFile;

// $path[1] - controlleris
// $path[2] - metodas
if (isset($path[1])) {
	$classFile = ucfirst($path['1']) .'Controller';
}
//var_dump($classFile);

if (file_exists('controllers/' .$classFile. '.php')) {
	include_once('controllers/' .$classFile. '.php');
	$object = new $classFile;
	if(!empty($path[2])){

		//padaryti i mazasias
		$method = $path[2];
		$id = $path[3];
		if (method_exists($object, $method)) {
			//$object->$method();
			if (!empty($path[3])) {
				$object->$method($id);
			} else {
				$object->add();
			}
			//$object->$method();
			
		} else {
			$object2->error404();
		}
	} else {
		$object->index();
	} 
} else {
	
	
	$object2->error404();
	

}