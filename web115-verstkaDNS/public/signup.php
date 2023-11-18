<?
require_once "$path/sys/syssignup.php";



?>
<!DOCTYPE html>
<html lang="en">
<? include_once "$path/private/head.php"; ?>
<body>
	 <div class="cont">
		<? include_once "$path/private/header.php"; ?>
		 <main class="main_signup">
            <div class="main_signup__window">
                <h3>Sign Up</h3>
                <form action="" method="post" id="formSignup">
                    <input type="text" name="login"  placeholder="login" id="login">
                    <input type="email" name="email" id="email" placeholder="e-mail">
                    <input type="password" name="password" placeholder="password" id="password">
                    <input type="password2" name="password2" placeholder="password2" id="password2">
                    <input type="submit" name="sendSignup" value="Sign Up">
                </form>
            </div>
		 </main>
		 <? include_once "$path/private/footer.php"; ?>

	 </div>
     <script src="/js/validate_client.js"></script>
</body>
</html>
