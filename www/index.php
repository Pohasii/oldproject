<?php
session_start();
//core file
include('config.php');
include('tpl/form.php');

$ip=$_SERVER['REMOTE_ADDR'];
//langs
if(!$_COOKIE["lang"] ) {
	setcookie("lang", 'ru', time(), "/");
	$setlang = 'ru';
} else {
	$setlang = $_COOKIE["lang"];
}
//help
if($_COOKIE["help"] ) {
	$help = 'help';
}

function che($result){
	$result = stripslashes($result);
	$result = htmlspecialchars($result);
	$result = trim($result);
	return $result;
}
//functions
function error() {
	ob_end_clean();
	include('error.php');
	exit;
}
function call($query) { //SELECT * FROM `ad` WHERE `id`='$id'
	$return;
	$result=mysql_query($query) or $return = NULL;
	if(mysql_num_rows($result)==0) {
		$return = NULL;
	} else while($row = mysql_fetch_array($result)) $return[] = $row;
	return $return;
}
function put($query) { //INSERT INTO `name` (`name`) values ('$name')
	$return = TRUE;
	mysql_query($query) or $return = FALSE;
	return $return;
}
function tourl($text) {
    $cyr = array(
    'ж',  'ч',  'щ',   'ш',  'ю',  'а', 'б', 'в', 'г', 'д', 'е', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ъ', 'ь', 'я', 'ё','ы', 'э',
    'Ж',  'Ч',  'Щ',   'Ш',  'Ю',  'А', 'Б', 'В', 'Г', 'Д', 'Е', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ъ', 'Ь', 'Я', 'Ё','Ы', 'Э',' ');
    $lat = array(
    'zh', 'ch', 'sht', 'sh', 'yu', 'a', 'b', 'v', 'g', 'd', 'e', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'y', 'x', 'q', 'e','y', 'e',
    'Zh', 'Ch', 'Sht', 'Sh', 'Yu', 'A', 'B', 'V', 'G', 'D', 'E', 'Z', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'c', 'Y', 'X', 'Q', 'E','Y', 'E', '_');
    return str_replace($cyr, $lat, $text);
}
function reArrayFiles(&$file_post) {
	$file_ary = array();
	$file_count = count($file_post['name']);
	$file_keys = array_keys($file_post);

	for ($i=0; $i<$file_count; $i++) {
		foreach ($file_keys as $key) {
			$file_ary[$i][$key] = $file_post[$key][$i];
		}
	}
	return $file_ary;
}
function getTpl($name,$result='',$result2='',$result3='') {
	$path = 'tpl/'.$name.'.php';
	ob_start();
	if(!include($path)) error();
	return ob_get_clean();
}

function q($value) {
	$value = trim($value); 
	$value = mysql_real_escape_string($value);
	$value = htmlspecialchars($value);
	return $value;
}

function cutString($string, $maxlen) {
	$string = strip_tags($string);
    $len = (mb_strlen($string) > $maxlen)
        ? mb_strripos(mb_substr($string, 0, $maxlen), ' ')
        : $maxlen
    ;
    $cutStr = mb_substr($string, 0, $len);
    return (mb_strlen($string) > $maxlen)
        ? $cutStr.'...'
        : $cutStr
    ;
}

function t($t) {
	$setlang = $_COOKIE["lang"];
	$res = call("SELECT * FROM `translate` WHERE clef='$t' AND lang='$setlang'");
	if(!$res) $res = call("SELECT `value` FROM `translate` WHERE clef='$t' AND lang='ru'");
	return $res[0]['value'];
}

//routing
$priQuery = explode("/",q($_GET["q"]));
$query = $priQuery;

function sampleArrs($result='',$field='',$fieldsecond=''){
		if(isset($fieldsecond) && $fieldsecond!=''){
		$resultcount = count($result);
				for($i=0;$i<$resultcount;$i++){
					if($result[$i][$field]==$fieldsecond){
						$result2[$i]=$result[$i];
					}
			}
		unset($result);
		unset($resultcount);
		} else return $result;
		if($result2==FALSE) return FALSE;
		else {
			$result2 = array_slice($result2, 0, 10);
			return $result2;
		}
	}
	
	$resultRightB = call("SELECT `nic_name`, `rating`, `role` FROM `users` WHERE `role`in('adc','mid','jungl') ORDER BY `rating` DESC LIMIT 0,100");
	

if($query[0] != '') {
	$controller = $query[0];
	unset($query[0]);
	$action = array_values($query);
	$statsRight = call("SELECT * FROM `stats`");
	$rightbarone = sampleArrs($resultRightB,'role','adc');
	$rightbartwo = sampleArrs($resultRightB,'role','mid');
	$rightbarsecond = sampleArrs($resultRightB,'role','jungl');
} else {
	$controller = 'main';
	$statsRight = call("SELECT * FROM `stats`");
	$rightbarone = sampleArrs($resultRightB,'role','adc');
	$rightbartwo = sampleArrs($resultRightB,'role','mid');
	$rightbarsecond = sampleArrs($resultRightB,'role','jungl');
}
//loading
$controllPath = 'app/'.$controller.'.php';
if(file_exists($controllPath)) {
	include($controllPath);
} else {
	error();
}

//load layout
$footer = call("SELECT * FROM `main_page` WHERE `pos`='footer' AND lang='$setlang'");
if(!$footer) $footer = call("SELECT * FROM `main_page` WHERE `pos`='footer' AND lang='ru'");
$lang = call("SELECT * FROM `lang`");
include('tpl/layout.php');
