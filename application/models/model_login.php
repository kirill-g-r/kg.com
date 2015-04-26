<?php
class Model_Login extends Model {
		
		
	// метод выборки данных
	function get_data() {
		
	}
	
	public function check_user_existence($username, $password) {
		
		$sql = 'SELECT *
				FROM `users`
				WHERE
					`username` = :username
				AND	`password` = :password
				LIMIT 10';
		
		$sth = $this->dbConnect->prepare($sql);
		$sth->execute(array(
								':username' => $username,
								':password' => $password
		));
		
		return $sth->fetch();
	
	}

}
