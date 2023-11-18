<?
session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
require_once "dev/info.php";
require_once "$path/system/db.php";

require_once "examp.php";


// $m = new Main();
// echo $m->foo();


if(@$_SERVER['REDIRECT_URL'] == '' || $_SERVER['REDIRECT_URL'] == "/main" ){
    require_once "$path/public/location.php";

}
elseif($_SERVER['REDIRECT_URL'] == '/getCountry'){
   $query = $db -> query("SELECT * FROM country ORDER BY name");
   $arrCountry = $query -> fetchAll(PDO::FETCH_ASSOC);
   echo json_encode($arrCountry);


}

elseif($_SERVER['REDIRECT_URL'] == '/getState'){
    $query = $db -> query("SELECT * FROM state WHERE country_id = '{$_POST['country']}' ORDER BY name");
    $arrState = $query -> fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($arrState);


}


elseif($_SERVER['REDIRECT_URL'] == '/getCity'){
    
    $query = $db -> query("SELECT * FROM city WHERE state_id = '{$_POST['state']}' ORDER BY name");
    $arrCity = $query -> fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($arrCity);


}


elseif($_SERVER['REDIRECT_URL'] == '/setUser'){

    move_uploaded_file($_FILES['file']['tmp_name'],"download/".$_FILES['file']['name']);
   //echo $_FILES['file']['tmp_name'];

}

elseif($_SERVER['REDIRECT_URL'] == '/setPerson'){
    $json = file_get_contents("php://input");
    print_r(json_decode($json, true));
    
}




