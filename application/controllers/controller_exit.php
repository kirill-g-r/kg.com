<?php

class Controller_Exit extends Controller
{
	
	function action_index() {
	
		session_start();
		$_SESSION = array();		
		session_destroy();

		setcookie('username', null);
		setcookie('password', null);
		
		header('Location:main');
	}
}
