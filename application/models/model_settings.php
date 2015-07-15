<?php

class Model_Settings extends Model {

	public $data;
	public $requested_page = 1;
	public $requested_page_count = 1;
	public $selected_range;

	public function add_new_category( $new_category = false ) {

		return $this->dbConnect->query( "INSERT INTO `charges_category` (`name`, `id_user`) VALUES ('".$new_category['category']."', ".$this->data['user_id'].") ;" );

	}

	public function get_data() {

		$this->data['category_list'] = $this->get_category_list();

		return $this->data;

	}

	function get_category_list() {

		return $this->dbConnect->query( 'SELECT DISTINCT `name` as `category`, `id`, `id_user` FROM `charges_category` WHERE `id_user` IN (0, '.$this->data['user_id'].') ORDER BY `name`;' )->fetchAll();

	}

	function delete_user_category($id) {

		return $this->dbConnect->query( 'DELETE FROM `charges_category` WHERE id = '.$id.' AND `id_user` = '.$this->data['user_id'].' AND id_user != 0;' );

	}

}
