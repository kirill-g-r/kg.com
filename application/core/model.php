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
	
			if (!$this->dbConnect = new PDO( 'mysql:host=localhost;dbname=MyWeekend', 'root', 'sergsund' )) {
				
				exit('Failed to connect to DB');
				
			}
			
		}			
			
	}
		
	// метод выборки данных
	public function get_data()
	{
		// todo
	}
}