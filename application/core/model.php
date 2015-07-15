<?php

class Model
{
	
	/*
		Модель обычно включает методы выборки данных, это могут быть:
			> методы нативных библиотек pgsql или mysql;
			> методы библиотек, реализующих абстракицю данных. Например, методы библиотеки PEAR MDB2;
			> методы ORM;
			> методы для работы с NoSQL;
			> и др.
	*/

	public $dbConnect;
	
	public function __construct() {
		
		if (!isset($this->dbConnect)) {

			global $config;

#			if (!$this->dbConnect = new PDO( 'mysql:host=localhost;dbname=MyCharges', 'root', 'sergsund' )) {

			if ($config) {

				if (!$this->dbConnect = new PDO( 'mysql:host='.$config['db_connect']['db_host'].';dbname='.$config['db_connect']['db_name'], $config['db_connect']['db_user'], $config['db_connect']['db_password'] )) {

					exit('Failed to connect to DB');

				}

			}

		}
			
	}
		
	// метод выборки данных
	public function get_data()
	{
		// todo
	}
}