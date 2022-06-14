<!doctype html>
<body>
	<meta charset="utf-8">

<?php

class ViewClass {
public function  view ($text, $name_png, $text_title)
{

$font = "arial.ttf";

$im  = imagecreatetruecolor(120, 160);
$bgc = imagecolorallocate($im, 186, 184, 173);
imagefilledrectangle($im, 0, 0, 130, 160, $bgc);
$im_title = imagecreatetruecolor(120, 50);
imagefilledrectangle($im_title, 0, 0, 120, 100, $bgc);

imagecopy($im,$im_title,0,107,0,0,120,40);

$img = imagecreatefrompng('counter.png');
$line=imagecreatefrompng('line.png');
imagecopymerge($im,$img,20,20,0,0,120,87,100);

$white = imagecolorallocate($im_title, 255, 255, 255);
imagettftext($im, 40, 0, 43, 80, $white, $font, $text);
imagecopymerge($im,$line,20,60,0,0,135,2,100);
$black = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 14, 0, 43, 130, $black, $font, $text_title);
imagepng($im, $name_png);
$i = $name_png;
imagedestroy($im);
return ($i);
}
}

$today = new DateTime(date('d.m.o. G:i:s'));
// $today = new DateTime('05.06.2022 10:15:45');

$date_lottery = new DateTime('02.06.2022 23:00');
$int = $today->diff($date_lottery);
$interval = explode(",", $int->format('%d,%H,%i,%s'));

$day = $interval[0];
$hour = $interval[1];
$min = $interval[2];
$sec = $interval[3];
 if ($day<=0){
$hours = new ViewClass();
$i = $hours->view($hour,'hour.png', 'hours');
$j = $hours->view($min,'min.png','minutes');
$k = $hours->view($sec,'sec.png','seconds');
}
else {
  $days= new ViewClass();
$i = $days->view($day,'day.png','days');
$j = $days->view($hour,'hour.png','hours');
$k = $days->view($min,'min.png','minutes');
}
?>
<div id="example">
<img src="<?php echo $i ?>">
<img src="<?php echo $j ?>">
<img src="<?php echo $k ?>">
</div>
<style>
  #example {
    background-color: #bab8ad;
    width: 380px;
    height: 180px;
    border: 1px solid #bab8ad;
    padding: 1px;
    overflow: auto;
  }
</style>

</div>
</body>