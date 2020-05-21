<?php 


	require 'db.php';
	$users = $gradingDB->users;


	// extract post 
	if(isset($_POST)){

		print_r($_POST);

		$error= array();

		if(isset($_POST['username']) && $_POST['username']!=''){
			$username = $_POST['username'];
			$username = trim(htmlspecialchars($username));
		}else{
			array_push($error, 'username field is empty');
		}

		if(isset($_POST['password']) && $_POST['password']!=''){
			$password = $_POST['password'];
			$password = trim(htmlspecialchars($password));
		}else{
			array_push($error, 'passowrd field is empty');
		}
		/*if(isset($_POST['password']) && $_POST['password']!=''){
			$password = $_POST['password'];
			$password = trim(htmlspecialchars($password));
		}else{
			array_push($error, 'passowrd field is empty');
		}*/

		$role = 'admin';

		if(isset($username) && isset($password) && isset($role)){
			$insert = $users->insertOne(
		    [	'username' => $username,
		    	'password' => $password,
		    	'role' => $role
		    ]	);
			if(isset($insert)){
				echo "<code>";
			    var_dump($insert);
				echo "</code>";

			}

		}else{
			print_r($error);
		}



	}


	// insert into users
	/*
*/
	// printf("Inserted %d documents", $insertOneResult->getInsertedCount());
	// var_dump($insertOneResult);


 ?>