<?php 

	require 'db.php';
	$users = $gradingDB->users;


	// extract post 
	if(isset($_POST)){
		// var_dump($_POST);

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

		if(isset($username) && isset($password)){

		$userLogin = $users->findOne(
			[
				'username'=>$username,
				'password'=> md5($password),
			]

		);

		if($userLogin == NULL){
			?>
			<div class="alert alert-warning">
				Username/Password does not match<br>
				Contact the administrator of the school <br>
				if your are not registered	
			</div>
			<?php
		}else{
			$userLogin= $userLogin->jsonSerialize();
			$user =[
				'username' => $userLogin->username,
				// 'id' => $userLogin->_id,
				
				'role' => $userLogin->role,
			];

			session_start();
			$_SESSION['user'] = $user;
			
switch ($_SESSION['user']['role']) {
	case 'admin':
		header('location: admin/dashboard.php');

		break;

		case 'examiners':
		header('location: examiner/dashboard.php');

		break;

		case 'student':
		header('location: student/dashboard.php');

		break;
	
	default:
		header('location: login.php');
		
		break;
}
		}
		}
	}

 ?>