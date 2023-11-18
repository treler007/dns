<?
	// $arr=[2,5,100,"Hello","Privet","Привет"];
	// $arr2=["name"=>"Bobik","age",22];
	// $number=100;
	// $string="Хмм... вот тут строка";
	// $all=["country"=>["russia","usa"],[242,533,1332],true,false,"Я в конце"];
	// print_r(json_encode($arr,JSON_UNESCAPED_UNICODE));
	// echo "<br>";
	// print_r(json_encode($arr2,JSON_UNESCAPED_UNICODE));
	// echo "<br>";
	// print_r(json_encode($number,JSON_UNESCAPED_UNICODE));
	// echo "<br>";
	// print_r(json_encode($string,JSON_UNESCAPED_UNICODE));
	// echo "<br>";
	// echo json_encode($all,JSON_UNESCAPED_UNICODE);
	require_once "sys/db.php";
	
	$query=$db->query("SELECT `name`,`price`,`cat_id` FROM `products`");
	
	//print_r($query->fetch_assoc());
	$row=$query->fetch(PDO::FETCH_ASSOC);
	$json=json_encode($row,JSON_UNESCAPED_UNICODE);
	echo $json;
?>
