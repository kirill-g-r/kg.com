<?php

class Login {
	
	public $dbConnect;
	
	public static function checkAccess() {
		session_start();
//		print_r($_SESSION);
//		print_r("/n" . '!!');
//		print_r($_POST);

		if (!Login::loginUserByCookieData()) {
	
			if (!Login::loginUserByFormData()) {
	
				echo 'SHIT LOGIN!';
				header('Location:/login');
				exit;
	
			}
				
		}
	
//		echo 'OK LOGIN!';
		return true;
	
	}
	
	public static function loginUserByFormData() {
	
		if (isset($_POST['username']) && isset($_POST['password'])) {
			
			if (list($username, $password) = Login::checkFormInputUserData()) {
				
				//$this->model = new Model_Login();
	
				if ($user_info = Login::check_user_existence($username, $password)) {								
	
#					$_SESSION['username'] = $user_info['username'];
#					$_SESSION['password'] = $user_info['password'];
					$_SESSION['email'] = $user_info['email'];
					$_SESSION['user_id']  = $user_info['id'];

					setcookie("username", $user_info['username']);
					setcookie("password", $user_info['password']);

					//header('Location:/' . $this->getRequestURI());
					//exit();
					//echo 'OK_loginUserByFormData';

					return true;
	
				} else {
	
////					echo 'Неверный логин или пароль form!!';

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
					$_SESSION['email'] = $user_info['email'];
					$_SESSION['user_id']  = $user_info['id'];
						
					//unset($this->model);
	
					//header('Location:' . $this->getRequestURI());
					//exit();
//					echo 'OK_loginUserBySessionData';
					return true;
	
				} else {
	
////					echo 'Неверный логин или пароль session!';
					header('Location:/login');
					exit;
	
				}
	
			}
	
		}
	
		return false;
	
	}

	public function loginUserByCookieData() {

		if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {

			if (list($username, $password) = Login::checkCookieUserData()) {

				//$this->model = new Model_Login();

				if ($user_info = Login::check_user_existence($username, $password)) {

#					$_SESSION['username'] = $user_info['username'];
#					$_SESSION['password'] = $user_info['password'];
					$_SESSION['email'] = $user_info['email'];
					$_SESSION['user_id']  = $user_info['id'];

					//unset($this->model);

					//header('Location:' . $this->getRequestURI());
					//exit();
					//echo 'OK_loginUserByCookieData';
					return true;

				} else {

////					echo 'Неверный логин или пароль session!';

					setcookie("username");
					setcookie("password");

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
	
			exit('Hacking attamp 1!');
	
		}
			
		$username = stripslashes($username);
		$username = htmlspecialchars($username);
		$username = trim($username);
			
		$password = stripslashes($password);
		$password = htmlspecialchars($password);
		$password = trim($password);
			
		if (empty($username) || empty($password)) {
	
			exit('Hacking attamp 2!');
	
		}
	
		return array($username, $password);
	
	}
	public function checkSessionUserData() {
	
		$username= $_SESSION['username'];
		$password = $_SESSION['password'];
			
		if (empty($username) || empty($password)) {
	
			exit('Hacking attamp 3!');
	
		}

		$username = stripslashes($username);
		$username = htmlspecialchars($username);
		$username = trim($username);
			
		$password = stripslashes($password);
		$password = htmlspecialchars($password);
		$password = trim($password);
			
		if (empty($username) || empty($password)) {
	
			exit('Hacking attamp 4!');
	
		}
	
		return array($username, $password);
	
	}
	public function checkCookieUserData() {

		$username= $_COOKIE['username'];
		$password = $_COOKIE['password'];

		if ( empty($username) || empty($password) ) {

//			exit('Hacking attamp 5!');
			return false;

		}

		$username = stripslashes($username);
		$username = htmlspecialchars($username);
		$username = trim($username);

		$password = stripslashes($password);
		$password = htmlspecialchars($password);
		$password = trim($password);

		if (empty($username) || empty($password)) {

			exit('Hacking attamp 6!');

		}

		return array($username, $password);

	}
	public function check_user_existence($username, $password) {

		global $config;

		if ($config) {

			if (!$dbConnect = new PDO('mysql:host=' . $config['db_connect']['db_host'] . ';dbname=' . $config['db_connect']['db_name'], $config['db_connect']['db_user'], $config['db_connect']['db_password'])) {

#		if (!$dbConnect = new PDO( 'mysql:host=localhost;dbname=MyCharges', 'root', 'ahdierahzuexeeco' )) {
#		if (!$dbConnect = new PDO( 'mysql:host=localhost;dbname=MyCharges', 'root', 'sergsund' )) {

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

			$result = $sth->fetch();
			unset($dbConnect);

			return $result;

		}
	
	}
	
}