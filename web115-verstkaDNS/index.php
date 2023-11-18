<?
session_start();
	$path=$_SERVER['DOCUMENT_ROOT'];
	require_once "$path/sys/db.php";

	if(@$_SERVER['REDIRECT_URL'] == "" OR $_SERVER['REDIRECT_URL'] == "/main"):
		require_once "$path/public/main.php";
	elseif($_SERVER['REDIRECT_URL'] == "/login"):
		require_once "$path/public/login.php";
	elseif($_SERVER['REDIRECT_URL'] == "/signup"):
		require_once "$path/public/signup.php";
	elseif($_SERVER['REDIRECT_URL'] == "/cart"):
		require_once "$path/public/cart.php";
    elseif($_SERVER['REDIRECT_URL'] == "/products"):
		require_once "$path/public/products.php";
	elseif($_SERVER['REDIRECT_URL'] == "/admin.php"):
		require_once "$path/public/admin.php";
	elseif($_SERVER['REDIRECT_URL'] == "/search.php"):
			require_once "$path/public/search.php";
	elseif($_SERVER['REDIRECT_URL'] == "/card-product"):
			require_once "$path/public/cardProduct.php";
	else:
		require_once "$path/public/404.php";

	endif;
	