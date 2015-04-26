<?php

class Controller_Main_Old extends Controller
{
	public function __construct() {
		
		$this->model = new Model_Main_Old();
		$this->view = new View();
		
	}
				
	function action_index() {

		$this->model->get_data();
		$this->view->generate('main_view_old.php', 'template_view.php');
				
	}
}