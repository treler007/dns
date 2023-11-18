<?
    session_start();
	$path=$_SERVER['DOCUMENT_ROOT'];
	require_once "$path/sys/db.php";

    if(isset($_POST['sendSignup'])){
        require_once "$path/sys/libs/validate.php";
        $errors=[];
        if(clearValue($_POST['login'])==""){
            $errors[]="Введите Логин";
        }
        

        if($_POST['password']==""){
            $errors[]="Введите Пароль";
        }

        if(empty($errors)){
            $query=$db->query("SELECT `login`,`password`,`status` FROM users WHERE `login`='$_POST[login]'");
           
            if( $query->rowCount()>0){
                // 1 способ md5
              //  if($query->fetch_assoc()['password']==md5($_POST['password']))echo "Ура!";
             $passwordInDB= $query->fetch();
                //2 способ password_hash
                if(password_verify($_POST['password'],$passwordInDB['password']))echo "Ура!";
                    $_SESSION['auth']=true;
                    $_SESSION['login']=$passwordInDB['login'];
                    $_SESSION['status']=$passwordInDB['status'];
                    
                   
              

                /* 
                    $2y$10$p4Vpga3vqm9a1YffITrTLuO9jUCyVdJDjCQZ/Y6cK8NXOskQCa1Bm

                */

                
            }

            
        }
        else echo $errors[0];



    }

?>
<!DOCTYPE html>
<html lang="en">
<? include_once "$path/private/head.php"; ?>
<body>
	 <div class="cont">
		<? include_once "$path/private/header.php"; ?>
		 <main class="main_signup">
            <div class="main_signup__window">
                <h3>Log In</h3>
                <form action="" method="post" id="formSignup">
                    <input type="text" name="login"  placeholder="login" id="login">
                   
                    <input type="password" name="password" placeholder="password" id="password">
                  
                    <input type="submit" name="sendSignup" value="Log In">
                </form>
            </div>
		 </main>
		 <? include_once "$path/private/footer.php"; ?>

	 </div>
     <script src="/js/validate_client.js"></script>
	
</body>
</html>
