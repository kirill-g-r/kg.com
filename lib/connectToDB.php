<?php

class connectToDb {
	
	public $connection;
	
	function __construct() {
		$x = '!!empty!!';
	#	$this->connection = new PDO('localhost', 'root', 'sergsund');
	#	$x = $this->connection->query("SHOW DATABASES");
	
		$z = new PDO($dsn, $username, $passwd, $options); 
		
		#$x = $this->connection->query("SHOW FULL PROCESSLIST");
#		$x = mysql_pconnect("localhost", "root", "sergsund");
#		mysql_select_db("quakes", $x);
#		$res=mysql_query('select * from quakes limit 10', $x);
#		$res = mysql_fetch_array($res);
		print_r($x);
	}
	
}
$connect = new connectToDb();

?>