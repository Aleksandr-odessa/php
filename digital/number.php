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

function create_line($num)
{
$segm1 = [30,15,30,30];
$segm2 = [30,40,30,55];
$segm3 = [15,60,25,60];
$segm4 = [10,40,10,55];
$segm5 = [10,15,10,30];
$segm6 = [15,10,25,10];
$segm7 = [15,35,25,35];
$zero = [$segm1, $segm2,$segm3, $segm4, $segm5,$segm6];
$one = [$segm1, $segm2];
$two = [$segm6, $segm1, $segm7, $segm4, $segm3];
$three = [$segm6, $segm1, $segm7, $segm2, $segm3];
$four = [$segm5, $segm7, $segm1, $segm2];
$five = [$segm6, $segm5, $segm7, $segm2, $segm3];
$six = [$segm6, $segm5, $segm7, $segm2, $segm3, $segm4 ];
$seven = [$segm1, $segm2, $segm6];
$eight =[$segm1, $segm2, $segm3, $segm4, $segm5, $segm6, $segm7];
$nine = [$segm1, $segm2, $segm3, $segm5, $segm6, $segm7];

$arr_num = str_split($num);
$count_arr_num = count($arr_num)-1;

$array_number = [$zero,$one,$two,$three,$four,$five,$six,$seven,$eight,$nine];
foreach ($arr_num as $arr)
{
    $res_number[] = $array_number[$arr];
}


class Numbers
{
    public function create_number($num)
    {
$j = imagecreatetruecolor(40, 70);
imageSetThickness($j, 3);
$color = imageColorAllocate($j, 255, 255, 255);
foreach ($num as $key) {
imageLine($j, $key[0], $key[1], $key[2], $key[3], $color);
}
return $j;
}
}
for ($ind=0; $ind<=$count_arr_num; $ind++){
$_number = new Numbers();
$k = $_number ->create_number($res_number[$ind]);
$mas_object[] = $k;
}
$i = imagecreatetruecolor(600, 70);
imageSetThickness($i, 3);
$color = imageColorAllocate($i, 255, 255, 255);
$w = 40;
foreach ($mas_object as $mas)
{
$j = $mas;
imagecopymerge($i, $j, $w, 0, 0, 0, 80, 80, 100);
$w+=50;
}
Header("Content-type: image/jpeg");
imageJpeg($i);
imageDestroy($i);
imageDestroy($j);
}


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if (empty($_POST["number"])) {
    include('index.php');
     echo '<script>
alert( "Empty field. Please enter numbers" );
</script>';
  }
  else
  {
    if (ctype_digit($_POST["number"]))
    {
$number = test_input($_POST["number"]);
create_line($number);
    }
    else {
          include('index.php');
          echo '<script>
alert( "Please enter ONLY numbers" );
</script>';
    }
  }
}