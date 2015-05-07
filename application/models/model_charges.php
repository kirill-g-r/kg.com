<?php

class Model_Charges extends Model
{

	public $data;

	public function addcharge( $new_charge = false ) {

		return $this->dbConnect->query( "INSERT INTO `charges` (`name`, `coast`, `currency`, `category`) VALUES ('".$new_charge['name']."', '".$new_charge['coast']."', '".$new_charge['currency']."', '".$new_charge['category']."') ;" );

	}

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

		return $this->data['total_sum'] = $total_sum;

	}

	public function get_summary_table_data() {

		return $this->data['summary_table'] = $this->dbConnect->query( 'SELECT * FROM `charges` ORDER BY `time` DESC;' )->fetchAll();

	}
	public function get_category_summary_table_data() {

		return $this->data['category_summary_table'] = $this->dbConnect->query( 'SELECT category, sum(coast) as `sum`, currency, count(id) as `payments_count`, max(`time`) as `last_payment` FROM `charges` GROUP BY `category` ORDER BY `sum` DESC;' )->fetchAll();

	}

	public function get_data()
	{	
		
		// Здесь мы просто сэмулируем реальные данные.

		$this->get_summary_table_data();

		$this->get_category_summary_table_data();

		$this->get_total_sum();

		return $this->data;



		
		return array(
			
			array(
				'Year' => '2012',
				'Site' => 'http://DunkelBeer.ru',
				'Description' => 'Промо-сайт темного пива Dunkel от немецкого производителя Löwenbraü выпускаемого в России пивоваренной компанией "CАН ИнБев".'
			),

			array(
				'Year' => '2012',
				'Site' => 'http://ZopoMobile.ru',
				'Description' => 'Русскоязычный каталог китайских телефонов компании Zopo на базе Android OS и аксессуаров к ним.'
			),

			array(
				'Year' => '2012',
				'Site' => 'http://GeekWear.ru',
				'Description' => 'Интернет-магазин брендовой одежды для гиков.'
			),

			array(
				'Year' => '2011',
				'Site' => 'http://РоналВарвар.рф',
				'Description' => 'Промо-сайт мультфильма "Ронал-варвар" от норвежских режиссеров. Мультфильм о самом нетипичном варваре на Земле, переполненный интересными приключениями и забавными ситуациями.'
			),

			array(
				'Year' => '2011',
				'Site' => 'http://TompsonTatoo.ru',
				'Description' => 'Персональный сайт-блог художника-татуировщика Алексея Томпсона из Санкт-Петербурга.'
			),

			array(
				'Year' => '2011',
				'Site' => 'http://DaftState.ru',
				'Description' => 'Страничка музыкальных и сануд продюсеров из команды "DaftState", работающих в стилях BreakBeat и BigBeat.'
			),

			array(
				'Year' => '2011',
				'Site' => 'http://TiltPeople.ru',
				'Description' => 'Сайт сообщества фотографов в стиле Tilt Shif.'
			),

			array(
				'Year' => '2011',
				'Site' => 'http://AbsurdGames.ru',
				'Description' => 'Страничка российской команды разработчиков независимых игр с необычной физикой и сюрреалистической графикой.'
			),

		);
	}

}
