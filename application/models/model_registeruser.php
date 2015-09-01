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
	public function createNewUser( $email, $username, $password, $currency ) {

		$sql = 'INSERT INTO `users` (
					`email`,
					`username`, 
					`password`,
					`currency`,
					`last_login`
				)
				VALUES (
					:email,
					:username,
					:password,
					:currency,
					now()
				);';
		
		$sth = $this->dbConnect->prepare($sql);
		
			$sth->execute(array(
						':email' 	=> $email,
						':username' => $username,
						':password' => $password,
						':currency' => $currency
				));


		return $this->dbConnect->lastInsertId();
			
		
	} 

}
