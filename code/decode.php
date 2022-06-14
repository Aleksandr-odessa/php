<?php
$decod = '';
$s = '! ) " ( £ * % & > < @ a b c d e f g h i j k l m n o';
$a = 'a b c d e f g h i j k l m n o p q r s t u v w x y z';
$t = ')g!ld, j(!ad "> h>£ gdol>!o!" o!(!c>£';
$shifr = explode(" ", $s);
$alphabet = explode(" ", $a);
$rez_alphabet = array_combine($shifr,$alphabet);
$text = mb_str_split($t);
foreach ($text as $_t)
{
	if (array_key_exists($_t,$rez_alphabet))
	{
		$decod.=$rez_alphabet[$_t];
	}
	else
	{
		$decod.=$_t;
	}
}
echo $decod
?>