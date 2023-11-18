<?    
session_start();
	$path=$_SERVER['DOCUMENT_ROOT'];
	require_once "$path/sys/db.php";

    $query=$db -> query("SELECT cart.id,products.name,cart.count,products.price FROM cart,products WHERE cart.product_id = products.id");

   

    foreach($query as $row){
       static $array = [];

       $array[] = ["id" => $row['id'], "name" => $row['name'],"count"=>$row['count'],"price"=>$row['price']];
    }

    echo json_encode($array);