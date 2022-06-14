<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title> Zarobki </title>
    <style>
      table {
   border-collapse: collapse;
}
   th, td {
    border: 2px solid black; /* Параметры границы */
    padding: 10px; /* Поля вокруг текста */
   }
      tr:hover {
    background: #d5e6a2; /* Цвет фона */
   }
  </style>
</head>
<body>

  <table cols = "3">
    <caption>Lista zarobkow za lipiec 2021.</caption>
    <tr>
      <th>nazwa loterii</th>
      <th>przychód</th>
      <th>zysk</th>
    </tr>
    <tr>
<?php
include_once ('zarobki.php');
foreach ($arr_result as $res){
    foreach ($res as $r){
echo '<td>'. $r .'</td>';
  }echo '</tr>';
}
?>
</table>



</body>
</html>