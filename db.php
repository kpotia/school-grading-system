<?php 
	require __DIR__.'/vendor/autoload.php'; 
	$client = new MongoDB\Client;
	$gradingDB = $client->gradingDB;
 ?>