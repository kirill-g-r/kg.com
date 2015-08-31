<?php

    function get_content() {

        // Формируем сегодняшнюю дату
        $date = date("d/m/Y");
        // Формируем ссылку
        $link = "http://www.cbr.ru/scripts/XML_daily.asp?date_req=$date";
        // Загружаем HTML-страницу
        $fd = fopen($link, "r");
        $text="";
        if (!$fd) {
            echo "Запрашиваемая страница не найдена " . date('Y-m-d H:i:s') ;
        } else {

            // Чтение содержимого файла в переменную $text
            while (!feof ($fd)) {

                $text .= fgets($fd, 4096);

            }

        }
        // Закрыть открытый файловый дескриптор
        fclose ($fd);
        return $text;
    }

    // Получаем текущие курсы валют в rss-формате с сайта www.cbr.ru
    $content = get_content();
    // Разбираем содержимое, при помощи регулярных выражений
    $pattern = "#<Valute ID=\"([^\"]+)[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>([^<]+)#i";
    preg_match_all($pattern, $content, $out, PREG_SET_ORDER);

    $USD = "";
    $EUR = "";

    foreach($out as $cur) {

      if ($cur[2] == 840) {
          $USD = str_replace(",",".",$cur[4]);
      }
      if ($cur[2] == 978) {
          $EUR = str_replace(",",".",$cur[4]);
      }

    }

#    echo "Доллар - ".$USD."\n";
#    echo "Евро - ".$EUR."\n";

    $fp = fopen('../../configurations/.currency_rate.ini', 'w');

    fwrite($fp, '[currency_rate]' . "\n");
    fwrite($fp, 'RUB_USD = ' . '0.015311' . "\n");
    fwrite($fp, 'RUB_EUR = ' . '0.0136787185' . "\n");
    fwrite($fp, 'RUB_RUB = ' . 1 . "\n");

    fwrite($fp, 'USD_USD = ' . 1 . "\n");
    fwrite($fp, 'USD_EUR = ' . '0.893391582' . "\n");
    fwrite($fp, 'USD_RUB = ' . $USD . "\n");

    fwrite($fp, 'EUR_USD = ' . '1.11933' . "\n");
    fwrite($fp, 'EUR_EUR = ' . 1 . "\n");
    fwrite($fp, 'EUR_RUB = ' . $EUR . "\n");

    fclose($fp);


?>