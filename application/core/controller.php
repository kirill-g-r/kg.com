<?php

class Controller {

	public $model;
	public $view;
	
	function __construct()
	{
		$this->view = new View();
	}
	
	// действие (action), вызываемое по умолчанию
	public function action_index() {
	
		// todo	
	}

	public function getConfig() {

		return $this->config = parse_ini_file('.configuration.ini', true);

	}
	
	public function getRequestURI() {
		
		$uri = end(explode('/', $_SERVER['REQUEST_URI']));
		
		if ($uri == 'login') {			
			
			return 'main_old';
			
		} else {
			
			return $uri;
			
		}
		
		return end( explode( '/', $_SERVER['REQUEST_URI'] ) );
				
	}
	public function checkUserAccess() {

		require_once 'application/core/login.php';
		return Login::checkAccess();
		
	}
	public function userIsLogged() {

		session_start();
	
		if (isset($_SESSION['username'])
			&& isset($_SESSION['password'])
				&& !empty($_SESSION['username'])
					&& !empty($_SESSION['password'])) {
				
			return true;
				
		}
	
	}
	public function ajax_request() {

		if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
			&& strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

			if (@$_POST['type_request'] == 'ajax_request') {

				return $_POST['action'];

			} else {

				return false;

			}

		}

	}
	
	
}
