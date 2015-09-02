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
				$this->password,
				'RUB'
					
		)) {
				
			print_r('REGISTRATION FAIL!');
			exit;
				
		}
		
	}
	public function setUserSessionData() {
		
		session_start();

		$_SESSION['username'] = $this->username;
		$_SESSION['email'] = $this->email;
		$_SESSION['password'] = $this->password;
			
		
	}
	public function setUserCookiesData() {

		setcookie('username', $this->username);
		setcookie('email', $this->email);
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

		$user['username'] = $this->username;
		$user['email'] = 'admin@kirillgoryunov.com';
		$user['password'] = $this->password;

		exec("php /var/www/gkg/data/www/costscounter.kirillgoryunov.com/application/core/mail_registration.php '".serialize($user)."' ");

		return true;

	}
		
}