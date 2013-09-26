<?php
/***************************************************************************
 *                           usercp_sendicq.php
 *                            -------------------
 *   Разработка и оптимизация под WAP: Гутник Игорь ( чел ).
 *          2010 год
 ***************************************************************************/

if ( !defined('IN_PHPBB') )
{
	die('Hacking attempt');
	exit;
}

function u2w($text) {
$u2w=array(
"Р°"=>"а","Р±"=>"б","РІ"=>"в","Рі"=>"г","Рґ"=>"д","Рµ"=>"е","С‘"=>"ё","Р¶"=>"ж",
"Р·"=>"з","Рё"=>"и","Р№"=>"й","Рє"=>"к","Р»"=>"л","Рј"=>"м","РЅ"=>"н","Рѕ"=>"о",
"Рї"=>"п","СЂ"=>"р","СЃ"=>"с","С‚"=>"т","Сѓ"=>"у","С„"=>"ф","С…"=>"х","С†"=>"ц",
"С‡"=>"ч","С€"=>"ш","С‰"=>"щ","СЉ"=>"ъ","С‹"=>"ы","СЊ"=>"ь","СЌ"=>"э","СЋ"=>"ю",
"СЏ"=>"я","Рђ"=>"А","Р‘"=>"Б","Р’"=>"В","Р“"=>"Г","Р”"=>"Д","Р•"=>"Е","РЃ"=>"Ё",
"Р–"=>"Ж","Р—"=>"З","Р"=>"И","Р™"=>"Й","Рљ"=>"К","Р›"=>"Л","Рњ"=>"М","Рќ"=>"Н",
"Рћ"=>"О","Рџ"=>"П","Р "=>"Р","РЎ"=>"С","Рў"=>"Т","РЈ"=>"У","Р¤"=>"Ф","РҐ"=>"Х",
"Р¦"=>"Ц","Р§"=>"Ч","РЁ"=>"Ш","Р©"=>"Щ","РЄ"=>"Ъ","Р«"=>"Ы","Р¬"=>"Ь","Р­"=>"Э",
"Р®"=>"Ю","РЇ"=>"Я");
return strtr($text,$u2w);
}

function w2u($text) {
$w2u=array(
"а"=>"Р°","б"=>"Р±","в"=>"РІ","г"=>"Рі","д"=>"Рґ","е"=>"Рµ","ё"=>"С‘","ж"=>"Р¶",
"з"=>"Р·","и"=>"Рё","й"=>"Р№","к"=>"Рє","л"=>"Р»","м"=>"Рј","н"=>"РЅ","о"=>"Рѕ",
"п"=>"Рї","р"=>"СЂ","с"=>"СЃ","т"=>"С‚","у"=>"Сѓ","ф"=>"С„","х"=>"С…","ц"=>"С†",
"ч"=>"С‡","ш"=>"С€","щ"=>"С‰","ъ"=>"СЉ","ы"=>"С‹","ь"=>"СЊ","э"=>"СЌ","ю"=>"СЋ",
"я"=>"СЏ","А"=>"Рђ","Б"=>"Р‘","В"=>"Р’","Г"=>"Р“","Д"=>"Р”","Е"=>"Р•","Ё"=>"РЃ",
"Ж"=>"Р–","З"=>"Р—","И"=>"Р","Й"=>"Р™","К"=>"Рљ","Л"=>"Р›","М"=>"Рњ","Н"=>"Рќ",
"О"=>"Рћ","П"=>"Рџ","Р"=>"Р ","С"=>"РЎ","Т"=>"Рў","У"=>"РЈ","Ф"=>"Р¤","Х"=>"РҐ",
"Ц"=>"Р¦","Ч"=>"Р§","Ш"=>"РЁ","Щ"=>"Р©","Ъ"=>"РЄ","Ы"=>"Р«","Ь"=>"Р¬","Э"=>"Р­",
"Ю"=>"Р®","Я"=>"РЇ");
return strtr($text,$w2u);
}

?>