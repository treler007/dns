<?
session_start();
$path=$_SERVER['DOCUMENT_ROOT'];
// $path - содержит в себе путь к файлу с сайтом
require_once "$path/sys/db.php";

echo "<pre>";
echo "POST:<br>";
print_r($_POST);
echo "<br><br>";
echo "FILES:<br>";
print_r($_FILES);
echo "</pre>";    

if(isset($_POST['send'])){
   

    $name=$_FILES['fileSend']['name'];

    //print_r($type);
    if( preg_match("/\.((jp(e?)g)|(png)|)$/",$name,$type)){

        preg_match_all("/\.((jp(e?)g)|(png)|)$/",$name,$type);
        $type= $type[0][0];
        //$newName="";
        
        $newName=mt_rand(10000,99999).$type;
        
        echo "есть попадание!";
        move_uploaded_file($_FILES['fileSend']['tmp_name'],"$path/img/$newName");

    }
    else{
        echo "надо выбирать картинку вообще то";
    }
    
}


?>
<!DOCTYPE html>
<html lang="en">
<? include_once "$path/private/head.php"; ?>
<body>
	 <div class="cont">
		<? include_once "$path/private/header.php"; ?>
		 <main>
			 <div class="main__in">
                <div class="main__in__menu main__filter main__admin">
                    <h3>MENU</h3>  
                    <div id="main__cats" class="menu__point">Категории</div>
                    <div id="main__products" class="menu__point">Товары</div>
						
                    

                        
                    
                
                </div>
				<div class="main__in__content">
                    <div id="menu__cat" hidden>
                        <h3>Категории</h3>
                        Добавить категорию:<br>
                        <input type="text" name="" id="addCat"> <input id="addCatSend" type="button" value="AddCategory">
                        <h3>Список категорий</h3>
                        <div id="listCat">

                        </div>
                    </div>
                    <div id="menu__products">
                        <form action="" method="post" enctype="multipart/form-data">
                            <!--  $_POST["fileSend"] -->
                            <input type="text" name="productName" id="productName"><br>
                            <input type="number" name="productCat" id="productCat"><br>
                            <input type="number" name="productPrice" id="productPrice"><br>

                            <input type="file" name="fileSend" id="fileSend"><br>
                            <input type="submit" name="send" value="send">


                        </form>

                    </div>
                </div>
            </div>   
		 </main>
		 <? include_once "$path/private/footer.php"; ?>

	 </div>
	 <script>
        
	 </script>
</body>
</html>
