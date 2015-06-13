<?php

$config = parse_ini_file('configurations/.configuration.ini', true);

$config = array_merge($config,  parse_ini_file('configurations/.currency_rate.ini', true));

