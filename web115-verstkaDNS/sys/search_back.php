<?
$path=$_SERVER['DOCUMENT_ROOT'];
// $path - содержит в себе путь к файлу с сайтом
require_once "$path/sys/db.php";
// подключение к базе данных web115
$searchQuery=$db->query("SELECT * FROM `cat` WHERE `name` LIKE '%$_GET[searchHeaderAjax]%' ORDER BY `name` ASC");
$searchQueryProducts=$db->query("SELECT * FROM `products` WHERE `name` LIKE '%$_GET[searchHeaderAjax]%' ORDER BY `name` ASC");
//var_dump($searchQuery);
// echo "<h2>Результаты поиска: </h2>";
if($searchQuery->rowCount()>0){
    echo "<h3>Категории: </h3>";
    foreach($searchQuery as $row){
        echo "$row[name] <br>";
    }	
}

if($searchQueryProducts->rowCount()>0){
    echo "<h3>Товары: </h3>";
    foreach($searchQueryProducts as $row){
        echo "<span data-productid='$row[id]' class='goods'>$row[name] </span><br>";
    }	
}