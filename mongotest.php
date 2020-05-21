<?php 

	require __DIR__.'/vendor/autoload.php';
	echo __DIR__.'/vendor/autoload.php';

	
	$client = new new Mongo\Client();

	var_dump($client);


 ?>