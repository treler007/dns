<?
$path=$_SERVER['DOCUMENT_ROOT'];
// $path - содержит в себе путь к файлу с сайтом
require_once "$path/sys/db.php";
// подключение к базе данных web115

$query=$db->query("SELECT * FROM `cat`");
foreach($query as $key=> $row){
    $key++;
    echo "<span data-catId='$row[id]' class='catMaster'>$key: $row[name] <span data-catid='$row[id]' class='catRemove'> - </span></span> <br>";
}