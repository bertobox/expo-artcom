<?php
  $production = false;
  
	$config = array();
  
  if($production){
    $config['host']  = '';  //database host
  	$config['db']    = '';  //database name
  	$config['user']  = '';  //database user
  	$config['pass']  = '';  //database password
  }else{
    $config['host']  = '';  //database host
    $config['db']    = '';  //database name
    $config['user']  = '';  //database user
    $config['pass']  = '';  //database password
  }
  
?>