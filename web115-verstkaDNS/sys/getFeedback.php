<?
session_start();
$path=$_SERVER['DOCUMENT_ROOT'];
require_once "$path/sys/db.php";

if(empty($_POST['productid'])){
    exit;
}

$query = $db -> query("SELECT feedback.id, feedback.user_id, feedback.feedback, feedback.time_post, users.login FROM feedback,users WHERE product_id = $_POST[productid] AND feedback.user_id = users.id");

$arr = [];
foreach($query as $row){
    $arr[] = ["feedback" => $row['feedback'], "user_id" => $row['user_id'], "time_post" => $row['time_post']];
}



echo json_encode($arr);