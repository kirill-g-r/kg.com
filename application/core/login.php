<?php

class Login {
	
	public $dbConnect;
	
	public static function checkAccess() {
		session_start();
//		print_r($_SESSION);
//		print_r("/n" . '!!');
//		print_r($_POST); exit;

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
	
		if (isset($_POST['email']) && isset($_POST['password'])) {

			if (list($email, $password) = Login::checkFormInputUserData()) {
				
				//$this->model = new Model_Login();
	
				if ($user_info = Login::check_user_existence($email, $password, true)) {

#					$_SESSION['email'] = $user_info['email'];
#					$_SESSION['password'] = $user_info['password'];
					$_SESSION['email'] = $user_info['email'];
					$_SESSION['user_id']  = $user_info['id'];

					setcookie("username", $user_info['username']);
					setcookie("email", $user_info['email']);
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
		
		if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
	
			if (list($email, $password) = Login::checkSessionUserData()) {

				//$this->model = new Model_Login();
	
				if ($user_info = Login::check_user_existence($email, $password)) {
										
					$_SESSION['email'] = $user_info['email'];
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

		if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {

			if (list($email, $password) = Login::checkCookieUserData()) {

				//$this->model = new Model_Login();

				if ($user_info = Login::check_user_existence($email, $password)) {

#					$_SESSION['email'] = $user_info['email'];
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

					setcookie("password");

					header('Location:/login');
					exit;

				}

			}

		}

		return false;

	}
	
	public function checkFormInputUserData() {
	
		$email= $_POST['email'];
		$password = $_POST['password'];
			
		if (empty($email) || empty($password)) {

			exit('Hacking attamp 1!');
	
		}

		$email = stripslashes($email);
		$email = htmlspecialchars($email);
		$email = trim($email);
			
		$password = stripslashes($password);
		$password = htmlspecialchars($password);
		$password = trim($password);
			
		if (empty($email) || empty($password)) {
	
			exit('Hacking attamp 2!');
	
		}
	
		return array($email, $password);
	
	}
	public function checkSessionUserData() {

		$email= $_SESSION['email'];
		$password = $_SESSION['password'];
			
		if (empty($email) || empty($password)) {
	
			exit('Hacking attamp 3!');
	
		}

		$email = stripslashes($email);
		$email = htmlspecialchars($email);
		$email = trim($email);
			
		$password = stripslashes($password);
		$password = htmlspecialchars($password);
		$password = trim($password);
			
		if (empty($email) || empty($password)) {
	
			exit('Hacking attamp 4!');
	
		}
	
		return array($email, $password);
	
	}
	public function checkCookieUserData() {

		$email= $_COOKIE['email'];
		$password = $_COOKIE['password'];

		if ( empty($email) || empty($password) ) {

//			exit('Hacking attamp 5!');
			return false;

		}

		$email = stripslashes($email);
		$email = htmlspecialchars($email);
		$email = trim($email);

		$password = stripslashes($password);
		$password = htmlspecialchars($password);
		$password = trim($password);

		if (empty($email) || empty($password)) {

			exit('Hacking attamp 6!');

		}

		return array($email, $password);

	}
	public function check_user_existence($email, $password, $update_last_login = false) {

		global $config;

		if ($config) {

			if (!$dbConnect = new PDO('mysql:host=' . $config['db_connect']['db_host'] . ';dbname=' . $config['db_connect']['db_name'], $config['db_connect']['db_user'], $config['db_connect']['db_password'])) {

#		if (!$dbConnect = new PDO( 'mysql:host=localhost;dbname=MyCharges', 'root', 'ahdierahzuexeeco' )) {
#		if (!$dbConnect = new PDO( 'mysql:host=localhost;dbname=MyCharges', 'root', 'sergsund' )) {

				exit('Failed to connect to DB');

			}

			$sql = 'SELECT *,
							ADDDATE(`last_login`, INTERVAL + 5 MINUTE) as `check_time_login`
					FROM `users`
					WHERE
						`email` = :email
					AND	`password` = :password
					LIMIT 10';

			$sth = $dbConnect->prepare($sql);
			$sth->execute(array(
				':email' => $email,
				':password' => $password
			));

			$result = $sth->fetch();

			if ($result) {

				if ($update_last_login) {

					$sql = 'UPDATE `users`
						SET
							`last_login` = now()
						WHERE
							`id` = :id;';

					$sth = $dbConnect->prepare($sql);
					$sth->execute(array(
						':id' => $result['id']
					));

				} else {

					if (strtotime($result['check_time_login']) < strtotime(date('Y-m-d H:i:s'))) {

						setcookie('password', null);
						return false;

					}

				}

			}

			unset($dbConnect);

			return $result;

		}
	
	}
	
}