<?php

class Controller_Services extends Controller
{

	function action_index()
	{
		$this->checkUserAccess();
		$this->view->generate('services_view.php', 'template_view.php');
	}
}
