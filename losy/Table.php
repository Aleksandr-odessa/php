<?php

function createTable($nameDB)
{

define('LOTERIA', "CREATE TABLE lotteries (
	id int unsigned not null,
	name varchar(255) not null,
	ticket_price decimal(12, 2) not null,
	prize decimal(12, 2) not null,
	PRIMARY KEY (id))");

define('DRAWS', "CREATE TABLE draws (
	id int unsigned not null,
	lottery_id int unsigned not null,
	draw_date timestamp not null,
	won_number int,
	PRIMARY KEY (id),
	constraint draws_lottery_id
	foreign key (lottery_id)
	references lotteries (id)
	on delete cascade on update cascade)");

define('TICKETS',  "CREATE TABLE tickets (
	id int unsigned not null,
	draw_id int unsigned not null,
	bought_date timestamp not null,
	number int unsigned not null,
	PRIMARY KEY (ID),
	constraint tickets_draw_id
	foreign key (draw_id)
	references draws (id)
	on delete cascade on update cascade)");

$ins_loteries = "INSERT INTO lotteries VALUES
(1, 'GG World Million', 10.49, 300.00),
(2, 'GG World X', 12.99, 400.00)";

$ins_draws = "INSERT INTO draws VALUES
(1, 1, '2021-06-15 14:00:00', 32),
(2, 1, '2021-07-15 14:00:00', 47),
(3, 1, '2021-08-15 14:00:00', 5),
(4, 1, '2021-09-15 14:00:00', null),
(5, 2, '2021-07-01 16:00:00', 29),
(6, 2, '2021-08-01 16:00:00', 4),
(7, 2, '2021-09-01 16:00:00', null)";

$ins_tickets = "INSERT INTO  tickets VALUES
( 1, 1, '2021-05-16 18:21:34', 21),
( 2, 1, '2021-06-02 13:31:02', 29),
( 3, 1, '2021-06-15 14:00:02', 13),
( 4, 2, '2021-06-30 03:44:34', 47),
( 5, 2, '2021-07-02 07:09:02', 32),
( 6, 2, '2021-07-15 14:00:15', 5),
( 7, 3, '2021-07-15 15:44:34', 13),
( 8, 3, '2021-07-28 04:29:11', 5),
( 9, 3, '2021-08-15 13:59:58', 5),
(10, 3, '2021-08-15 14:00:01', 5),
(11, 4, '2021-08-25 01:15:48', 38),
(12, 5, '2021-06-04 22:01:53', 29),
(13, 5, '2021-06-24 05:25:09', 13),
(14, 5, '2021-07-01 16:00:05', 29),
(15, 5, '2021-07-01 16:00:02', 24),
(16, 5, '2021-07-01 16:00:03', 11),
(17, 6, '2021-07-24 04:32:56', 4),
(18, 6, '2021-08-01 16:02:01', 13),
(19, 7, '2021-07-16 22:34:49', 36),
(20, 7, '2021-08-04 16:00:55', 15),
(21, 7, '2021-08-04 16:00:55', 49),
(22, 7, '2021-08-04 16:00:55', 46)";

$link = new mysqli("localhost", "root", "", $nameDB);
if ($link)
{
    echo "connection is successful <br>";
}
else
{
    die ("Error: connection to MySQL is not successful " . $link->connect_error);
}
$link -> set_charset("utf8");

function createTab($name_SQL,$link)
{
	if ($link->query($name_SQL) === TRUE)
	{
  echo "Table created successfully <br>";
	}
else
	{
  echo "Error of creating table: " . $link->error;
	}
}


function insertDat($insert_data,$link)
{
if ($link->query($insert_data) === TRUE)
    {
  echo "insert data was successfully <br>";
    }
else
    {
  echo "Error insert data: " . $link->error;
    }
}


createTab(LOTERIA,$link);
createTab(DRAWS,$link);
createTab(TICKETS,$link);
insertDat($ins_loteries,$link);
insertDat($ins_draws ,$link);
insertDat($ins_tickets,$link);
echo "Connection completed";

$link->close();
}



createTable('Loterie');
