<?php

class Login {
	
	public $dbConnect;
	
	public static function checkFunc() {
		echo '!!!';
	}
	
	public static function checkAccess() {
		session_start();
//		print_r($_SESSION);
//		print_r("/n" . '!!');
//		print_r($_POST);

		if (!Login::loginUserBySessionData()) {
	
			if (!Login::loginUserByFormData()) {
	
				echo 'SHIT LOGIN!';
				header('Location:/login');
				exit;
	
			}
				
		}
	
		echo 'OK LOGIN!';
		return true;
	
	}
	
	public static function loginUserByFormData() {
	
		if (isset($_POST['username']) && isset($_POST['password'])) {
			
			if (list($username, $password) = Login::checkFormInputUserData()) {
				
				//$this->model = new Model_Login();
	
				if ($user_info = Login::check_user_existence($username, $password)) {								
	
					$_SESSION['username'] = $user_info['username'];
					$_SESSION['password'] = $user_info['password'];
	
					//header('Location:/' . $this->getRequestURI());
					//exit();
					echo 'OK_loginUserByFormData';
					return true;
	
				} else {
	
					echo 'Неверный логин или пароль form!';
					header('Location:/login');
					exit;
						
				}
	
			}
	
		}
	
		return false;
	
	}
	public function loginUserBySessionData() {
		
		if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
	
			if (list($username, $password) = Login::checkSessionUserData()) {

				//$this->model = new Model_Login();
	
				if ($user_info = Login::check_user_existence($username, $password)) {
										
					$_SESSION['username'] = $user_info['username'];
					$_SESSION['password'] = $user_info['password'];
						
					//unset($this->model);
	
					//header('Location:' . $this->getRequestURI());
					//exit();
					echo 'OK_loginUserBySessionData';
					return true;
	
				} else {
	
					echo 'Неверный логин или пароль session!';
					header('Location:/login');
					exit;
	
				}
	
			}
	
		}
	
		return false;
	
	}
	
	public function checkFormInputUserData() {
	
		$username= $_POST['username'];
		$password = $_POST['password'];
			
		if (empty($username) || empty($password)) {
	
			exit('Hacking attamp!');
	
		}
			
		$username = stripslashes($username);
		$username = htmlspecialchars($username);
		$username = trim($username);
			
		$password = stripslashes($password);
		$password = htmlspecialchars($password);
		$password = trim($password);
			
		if (empty($username) || empty($password)) {
	
			exit('Hacking attamp!');
	
		}
	
		return array($username, $password);
	
	}
	public function checkSessionUserData() {
	
		$username= $_SESSION['username'];
		$password = $_SESSION['password'];
			
		if (empty($username) || empty($password)) {
	
			exit('Hacking attamp!');
	
		}
			
		$username = stripslashes($username);
		$username = htmlspecialchars($username);
		$username = trim($username);
			
		$password = stripslashes($password);
		$password = htmlspecialchars($password);
		$password = trim($password);
			
		if (empty($username) || empty($password)) {
	
			exit('Hacking attamp!');
	
		}
	
		return array($username, $password);
	
	}
	public function check_user_existence($username, $password) {
						
		if (!$dbConnect = new PDO( 'mysql:host=localhost;dbname=MyWeekend', 'root', 'sergsund' )) {
		
			exit('Failed to connect to DB');
		
		}
	
		$sql = 'SELECT *
				FROM `users`
				WHERE
					`username` = :username
				AND	`password` = :password
				LIMIT 10';
	
		$sth = $dbConnect->prepare($sql);
		$sth->execute(array(
				':username' => $username,
				':password' => $password
		));
	
		return $sth->fetch();
	
	}
	
}