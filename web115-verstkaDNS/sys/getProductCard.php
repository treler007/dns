<?
session_start();
$path=$_SERVER['DOCUMENT_ROOT'];
require_once "$path/sys/db.php";

if(empty($_POST['productid'])){
    exit;
}

$query = $db -> query("SELECT * FROM products WHERE id = $_POST[productid]");


$result = $query -> fetch(PDO::FETCH_ASSOC);
$arr = ["id"=>$result['id'], "name"=>$result['name']];


echo json_encode($arr);