<?php

function selectIncome($nameDB,$logFileName)
{

$message ="Start \t". date('H:i:s') . "\n";
file_put_contents($logFileName, $message, );

$id =array();
$income = 'SELECT name, SUM(ticket_price) as income FROM draws JOIN tickets JOIN lotteries ON (draw_id=draws.id) AND (bought_date BETWEEN "2021-07-01" AND "2021-07-31") AND (lotteries.id=lottery_id) group BY name ORDER BY name';
$profit = 'SELECT name, SUM(ticket_price) as profit from draws JOIN tickets JOIN lotteries ON (draw_id=draws.id) AND (bought_date BETWEEN "2021-07-01" AND "2021-07-31") AND (lotteries.id=lottery_id) and (bought_date>draw_date) group BY name ORDER BY name';

$link = new mysqli("localhost", "root", "", $nameDB);
if ($link)
    {
    $message = 'connection is success  '.date('H:i:s') . "\n";
    file_put_contents($logFileName, $message, FILE_APPEND);
    }
else
    {
    $message = "Error: connection to MySQL is not successful " . $link->connect_error."  ".date('d.m.Y H:i:s') . "\n";
    file_put_contents($logFileName, $message, FILE_APPEND);
    die ("Error: connection to MySQL is not successful " . $link->connect_error);
    }
$link -> set_charset("utf8");
$result_income = $link->query($income);
$result_profit = $link->query($profit);
$row_cnt = $result_income -> num_rows;
if ($row_cnt > 0)
    {
foreach ($result_income  as $row)
        {
     $inc[] = $row;
        }
foreach ($result_profit  as $row)
        {
     $prof[] = $row;
        }
 for ($ind=0; $ind<=$row_cnt-1; $ind++)
        {
    $inc[$ind] ['profit'] = $inc[$ind]['income']-$prof[$ind]['profit'];
        }
array_push($inc, $row_cnt);
return $inc;
    }
}

$logFileName = "log_zarobki.txt";
$arr_result = selectIncome('Loterie', $logFileName);
$message = 'end program  '.date('H:i:s') . "\n";
file_put_contents($logFileName, $message, FILE_APPEND);
$count = array_pop($arr_result);