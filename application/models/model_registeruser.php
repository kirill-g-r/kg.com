<?php

class Model_RegisterUser extends Model {

	
	public function checkUserExistance( $email, $username ) {
		
		$sql = 'SELECT *
				FROM `users`
				WHERE
					`email` 	= :email
				AND	`username`	= :username				
				LIMIT 10';
		
		$sth = $this->dbConnect->prepare($sql);
		$sth->execute(array(
				':email' 	=> $email,
				':username' => $username				
		));

		return $sth->fetch();
		
	}
	public function createNewUser( $email, $username, $password ) {
		
		$sql = 'INSERT INTO `users` (
					`email`,
					`username`, 
					`password`
				)
				VALUES (
					:email,
					:username,
					:password
				);';
		
		$sth = $this->dbConnect->prepare($sql);
		
		return	$sth->execute(array(
						':email' 	=> $email,
						':username' => $username,
						':password' => $password
				));
			
		
	} 

}
