<?php

class Controller_Main extends Controller
{
				
	function action_index() {
				
		if ( $this->userIsLogged() ) {
			
			header('Location:/portfolio');
		
		} else {
			
			$this->view->generate('', 'main_view.php');
			//$this->view->generate('main_view.php', 'template_view.php');
			
		}
			
	}
		
}