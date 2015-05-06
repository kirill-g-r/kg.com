<?php

class Model_Charges extends Model
{

	public function addcharge( $new_charge = false ) {

		return $this->dbConnect->query( "INSERT INTO `charges` (`name`, `coast`, `currency`, `category`) VALUES ('".$new_charge['name']."', '".$new_charge['coast']."', '".$new_charge['currency']."', '".$new_charge['category']."') ;" );

	}

	public function get_total_sum($summary_table) {

		global $config;

		$total_sum = 0;

		foreach ($summary_table as $s_t) {

			if ($s_t['currency'] == 'EUR') {

				$total_sum += $s_t['coast'] * $config['currency_rate']['RUB_EUR'];

			} else if ($s_t['currency'] == 'USD') {

				$total_sum += $s_t['coast'] * $config['currency_rate']['RUB_USD'];

			} else {

			$total_sum += $s_t['coast'];

			}

		}

		return $total_sum;

	}

	public function get_data()
	{	
		
		// Здесь мы просто сэмулируем реальные данные.

	
		$data['summary_table'] = $this->dbConnect->query( 'SELECT * FROM `charges`;' )->fetchAll();

		$data['total_sum'] = $this->get_total_sum($data['summary_table']);

		return $data;
		
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
