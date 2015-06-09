<?php

class Model_Summary extends Model
{

	public $data;
	public $requested_page;
	public $selected_range;

	public function get_coast_in_RUB($data) {

		global $config;

		if ($data['currency'] == 'EUR') {

			return $data['coast'] * $config['currency_rate']['RUB_EUR'];

		} else if ($data['currency'] == 'USD') {

			return $data['coast'] * $config['currency_rate']['RUB_USD'];

		} else {

			return $data['coast'];

		}

	}

	public function get_total_sum() {

		$total_sum = 0;

		foreach ($this->data['summary_table'] as $s_t) {

			$total_sum += $this->get_coast_in_RUB($s_t);

		}

		return $total_sum;

	}

	public function get_summary_table_data() {

		return $this->dbConnect->query( 'SELECT c.*, cc.`name` as `category` FROM `charges` c JOIN `charges_category` cc ON c.`id_category` = cc.`id` WHERE c.`id_user` = '.$this->data['user_id'].' ORDER BY c.`time` DESC;' )->fetchAll();

	}

	public function get_summary_table_data_page() {

		if (isset($this->selected_range)) {

			$sql = 'SELECT	c.*,
							cc.`name` as `category`
					FROM `charges` c
					JOIN `charges_category` cc
					ON c.`id_category` = cc.`id`
					WHERE c.`id_user` = ' . $this->data['user_id'] . '
					ORDER BY c.`time` DESC
					LIMIT ' . $this->selected_range['from'] . ',' . $this->selected_range['count'] . ';';

			return $this->dbConnect->query($sql)->fetchAll();

		}

	}

	public function delete_charge_from_summary_table($id) {

		return $this->dbConnect->query( 'DELETE FROM `charges` WHERE id = '.$id.' ;' );

	}

	public function get_data_OLD()	{
		
		// Здесь мы просто сэмулируем реальные данные.

		$this->data['summary_table'] = $this->get_summary_table_data();

		$this->data['total_sum'] = $this->get_total_sum();

		$this->data['summary_table_page']['name'] = $this->requested_page;
		$this->data['summary_table_page']['value'] = $this->requested_page;

		return $this->data;


	}

	public function get_data()	{

		$this->data['summary_table'] = $this->get_summary_table_data_page();

		$this->data['total_sum'] = $this->get_total_sum();

		$this->data['summary_table_page']['value'] = $this->requested_page;
		$this->data['summary_table_page']['count'] = $this->get_page_count();

		return $this->data;


	}

	public function get_page_count() {

		$sql = 'SELECT	count(c.id) as `count`
					FROM `charges` c
					WHERE c.`id_user` = 1';

		$result = $this->dbConnect->query($sql)->fetch();

		return ceil($result['count'] / 10 );





//		return $this->dbConnect->query($sql)->fetchAll();

	}

}
