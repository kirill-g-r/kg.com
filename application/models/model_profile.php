<?php

class Model_Profile extends Model {

	public $data;

	public function update_profile( $new_profile_data ) {

		$sql = "
					UPDATE `users`
					SET `username` 	= '".$new_profile_data['username']."',
						`password` 	= '".$new_profile_data['password']."',
						`email` 	= '".$new_profile_data['email']."'
					WHERE id 	= ".$this->data['user_id']." ;
				";

		return $this->dbConnect->query($sql);

	}

}
