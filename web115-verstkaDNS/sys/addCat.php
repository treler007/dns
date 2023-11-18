<?
$path=$_SERVER['DOCUMENT_ROOT'];
// $path - содержит в себе путь к файлу с сайтом
require_once "$path/sys/db.php";
// подключение к базе данных web115

$db->query("INSERT INTO `cat`(`name`,`status`) VALUES('$_GET[addCat]',1)");