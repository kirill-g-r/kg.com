<?php

class Model_Charges extends Model {

	public $data;

	public function addcharge( $new_charge = false ) {

		return $this->dbConnect->query( "INSERT INTO `charges` (`id_user`, `name`, `coast`, `currency`, `id_category`) VALUES (".$this->data['user_id'].", '".$new_charge['name']."', '".$new_charge['coast']."', '".$new_charge['currency']."', '".$new_charge['category']."') ;" );

	}

	public function setcurrency( $new_charge = false ) {

		return $this->dbConnect->query( "UPDATE `users` SET `currency` = '".$new_charge['currency']."' WHERE `id` = ".$this->data['user_id'].";" );

	}

	public function get_coast_in_total_currency($data) {

		global $config;

		if ($data['currency'] == 'EUR') {

			return $data['coast'] * $config['currency_rate']['EUR_'.$this->data['currency']];

		} else if ($data['currency'] == 'USD') {

			return $data['coast'] * $config['currency_rate']['USD_'.$this->data['currency']];

		} else if ($data['currency'] == 'RUB') {

			return $data['coast'] * $config['currency_rate']['RUB_'.$this->data['currency']];

		} else {

			return $data['coast'];

		}

	}

	public function get_total_sum() {

		$total_sum = 0;

		foreach ($this->data['summary_table'] as $s_t) {

			$total_sum += $this->get_coast_in_total_currency($s_t);

		}

		return round($total_sum, 2);

	}

	public function get_summary_table_data() {

		return $this->dbConnect->query( 'SELECT c.*, cc.`name` AS `category` FROM `charges` c JOIN `charges_category` cc ON c.id_category = cc.id WHERE c.`id_user` = '.$this->data['user_id'].'  ORDER BY `time` DESC;' )->fetchAll();


	}
	public function get_category_summary_table_data() {

		global $config;

		$sql = 'SELECT	c.`id_category`,
						cc.`name` AS `category`,
						ROUND(
							SUM(
								IF((c.`currency` = "USD"),
									(c.`coast`* "'.$config['currency_rate']['USD_'.$this->data['currency']].'"),
									IF((c.`currency` = "EUR"),
										(c.`coast`* " '.$config['currency_rate']['EUR_'.$this->data['currency']].' "),
										IF((c.`currency` = "RUB"),
											(c.`coast`* " '.$config['currency_rate']['RUB_'.$this->data['currency']].' "),
											(c.`coast`)))))
							 , 2)
						AS `sum`,
						"RUB" as `currency`,
						COUNT(c.`id`) AS `payments_count`,
						MAX(c.`time`) AS `last_payment`
				FROM `charges` c
				JOIN `charges_category` cc
				ON c.`id_category` = cc.`id`
				WHERE c.`id_user` = '.$this->data['user_id'].'
				GROUP BY c.`id_category`
				ORDER BY `sum` DESC;';

		return $this->dbConnect->query( $sql )->fetchAll();

	}

	public function delete_charge_from_summary_table($id) {

		return $this->dbConnect->query( 'DELETE FROM `charges` WHERE id = '.$id.' ;' );

	}

	public function get_category_list() {

		return $this->dbConnect->query( 'SELECT DISTINCT `name` as `category`, `id` FROM `charges_category` WHERE `id_user` IN (0, '.$this->data['user_id'].') ORDER BY `name`;' )->fetchAll();

	}

	public function get_currency() {

		$result = $this->dbConnect->query( 'SELECT `currency` FROM `users` WHERE `id` = '.$this->data['user_id'].';' )->fetch();

		return $result['currency'];

	}

	public function get_data()
	{

		$this->data['currency'] = $this->get_currency();

		$this->data['summary_table'] = $this->get_summary_table_data();

		$this->data['category_summary_table'] = $this->get_category_summary_table_data();

		$this->data['total_sum'] = $this->get_total_sum();

		$this->data['charges_category_list'] = $this->get_category_list();

		return $this->data;

	}

}
