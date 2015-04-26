<?php

class Controller_Contacts extends Controller
{
	
	function action_index()
	{
		session_start();
		
		print_r($_SESSION);
		$this->view->generate('contacts_view.php', 'template_view.php');
	}
}
