<?php

class Model_Summary extends Model
{

	public $data;

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

	public function delete_charge_from_summary_table($id) {

		return $this->dbConnect->query( 'DELETE FROM `charges` WHERE id = '.$id.' ;' );

	}

	public function get_data()
	{	
		
		// Здесь мы просто сэмулируем реальные данные.

		$this->data['summary_table'] = $this->get_summary_table_data();

		$this->data['total_sum'] = $this->get_total_sum();

		$this->data['summary_table_month']['name'] = date('F');
		$this->data['summary_table_month']['value'] = '04';

		return $this->data;


	}

}
