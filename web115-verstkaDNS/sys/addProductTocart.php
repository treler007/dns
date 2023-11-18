<?
$path=$_SERVER['DOCUMENT_ROOT'];
// $path - содержит в себе путь к файлу с сайтом
require_once "$path/sys/db.php";

$time = date("Y-m-d H:i:s"); //TIMESTAMP yyyy.mm.dd HH-ii-ss


$query = $db -> prepare("INSERT INTO `cart`(`product_id`,`time_add`,`count`) VALUES(:id,'$time',1)");

$query ->execute([
    ":id"=>$_POST['id']
  
]);
