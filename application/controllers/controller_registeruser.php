<?php

class Controller_Registeruser extends Controller {
	
	public $email;
	
	public $username;
	
	public $password;

	public $user_id;

	public $avatarDir = 'images/users/';
	
	function __construct() {
		
		$this->model = new Model_RegisterUser();
		$this->view = new View();
		
	}
				
	function action_index() {


		//$this->checkUserLogIn();
		
		$this->checkRegistrationFormData();
		
		$this->checkUserExistance();
		
		$this->registerUser();
		
		$this->setUserCookiesData();

		$this->createProfile();
		
		$this->sendMailToNewUser();
		
		header('Location:/main');
		
		
			
//		require_once 'application/core/registeruser.php';
		echo 'IT WORKS!';
//		return Registeruser::checkFunc();

	}
	
	public function checkUserLogIn() {
		
		if ( $this->userIsLogged() ) {
				
			header('Location:/main');
			exit;
				
		}
		
	}
	
	public function checkRegistrationFormData() {
		
		if ( isset( $_POST['email'] )
		 
			&& isset( $_POST['username'] )
				
				&& isset( $_POST['password'] ) ) {			
			
			$email = stripslashes( $_POST['email'] );
			$email = htmlspecialchars( $_POST['email'] );
			$email = trim( $_POST['email'] );
				
			$username = stripslashes( $_POST['username'] );
			$username = htmlspecialchars( $_POST['username'] );
			$username = trim( $_POST['username'] );
			
			$password = stripslashes( $_POST['password'] );
			$password = htmlspecialchars( $_POST['password'] );
			$password = trim( $_POST['password'] );
				
			if (empty($email) || empty($username) || empty($password)) {
			
				exit('Hacking attamp!');
			
			}
			
			$this->email = $email;
			$this->username = $username;
			$this->password = $password;

			return true;
			
		}
		
		header('Location:/main');
		exit;
		
	}
	
	public function checkUserExistance() {
		
		if ($this->model->checkUserExistance(
				
					$this->email,
					$this->username								
					
			)) {
			
			print_r('USER ALREADY EXIST!');
			exit;
			
		}
		
	}
	public function registerUser() {
		;
		if (!$this->user_id = $this->model->createNewUser(
		
				$this->email,
				$this->username,
				$this->password
					
		)) {
				
			print_r('REGISTRATION FAIL!');
			exit;
				
		}
		
	}
	public function setUserSessionData() {
		
		session_start();

		$_SESSION['username'] = $this->username;
		$_SESSION['password'] = $this->password;
			
		
	}
	public function setUserCookiesData() {

		setcookie('username', $this->username);
		setcookie('password', $this->password);

	}
	public function createProfile() {

		$this->createAvatar();

	}
	public function createAvatar() {

		$avatarDir = $this->avatarDir . $this->user_id . '/';

		if (!mkdir($avatarDir, 0777, true)) {
			die($avatarDir . 'Error create avatar folder');
		}

		if (!copy($this->avatarDir.'0/0_avatar.jpg', $avatarDir.'/'.$this->user_id.'_avatar.jpg')) {
			die($avatarDir . 'Error create avatar image');
		}

	}
	public function sendMailToNewUser() {
		
		//mail("goryunov.k@mail.ru", "My Subject", "Line 1\nLine 2\nLine 3");
		//echo 'OK!';
		
		//$to  = $this->email;
		//$to = 'Goryunov.K@mail.ru';
		$to = 'To: Mary <'.$this->email.'>';
		
		// тема письма
		$subject = 'Welcome To CHARGES COUNTER';
		
		// текст письма
		$message = '
					<html>
					<head>
					  <title>Birthday Reminders for August</title>
					</head>
					<body>
					  <p>Here are the birthdays upcoming in August!</p>
					  <table>
					    <tr>
					      <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
					    </tr>
					    <tr>
					      <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
					    </tr>
					    <tr>
					      <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
					    </tr>
					  </table>
					</body>
					</html>
					';
		
		// Для отправки HTML-письма должен быть установлен заголовок Content-type
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		// Дополнительные заголовки
		//$headers .= 'To: Mary <'.$this->email.'>, Kelly <sergsund@yandex.ru>' . "\r\n";
		$headers .= 'To: Mary <'.$this->email.'>' . "\r\n";
		$headers .= 'From: CHARGES COUNTER <info@kirillgoryunov.com>' . "\r\n";
		//$headers .= 'Cc: sergsund@yandex.ru' . "\r\n";
		//$headers .= 'Bcc: sergsund@yandex.ru' . "\r\n";
		
		// Отправляем
		return mail($to, $subject, $message, $headers);
		
	}
		
}