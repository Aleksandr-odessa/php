<?php

function cl_print_r ($var, $label = '')
{
  $str = json_encode(print_r ($var, true));
  echo "<script>console.group('".$label."');console.log('".$str."');console.groupEnd();</script>";
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if (empty($_POST["text"])) {
    include('index.php');
     echo '<script>
alert( "Empty field. Please enter text" );
</script>';
  }
  else
  {
    $text = test_input($_POST["text"]);
    coding($text);
     }
}

function coding($data){
$cod = '';
$s = '! ) " ( £ * % & > < @ a b c d e f g h i j k l m n o';
$a = 'a b c d e f g h i j k l m n o p q r s t u v w x y z';
$shifr=explode(" ", $s);
$alphabet = explode(" ", $a);
$rez_alphabet = array_combine($alphabet, $shifr);
$mas_text = mb_str_split($data);
foreach ($mas_text as $mas)
{
   if (array_key_exists($mas,$rez_alphabet))
   {
     $cod.=$rez_alphabet[$mas];
   }
   else
   {
     $cod.=$mas;
   }
 }
 echo $cod;
}