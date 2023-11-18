<?
session_start();
	$path=$_SERVER['DOCUMENT_ROOT'];
	require_once "$path/sys/db.php";

	$email="@examp@le@google.com";
	//echo strpos($email,".com");//7
	// if(strpos($email,"@")===false){
	// 	echo "yfi";
	// }
	// $words="Привет, Мир! Как твои дела?";
	// print_r(explode(' ',$words));

	// $wordss="яблоко,груша,    апельсин ";
	// print_r(explode(",",$wordss));

	// $ddd=" fesf ";
	// trim($ddd);//ltrim rtrim
	// //trim - обрезает пробелы

	// $html="<style> *{color:red;} </style> Привет";
	
	// $html=htmlspecialchars($html);

	// echo $html."&lt;&lt;&lt;&lt;&lt;&lt;&lt;";
	$password="qwerty!Q-+e";
	$passwordMd5=md5($password);
	$passwordHash=password_hash($password,PASSWORD_DEFAULT);

	// echo "$password <br>";
	// echo "$passwordMd5 <br>";
	// echo "$passwordHash <br>";







?>
<!DOCTYPE html>
<html lang="en">
<? include_once "$path/private/head.php"; ?>
<body>
	 <div class="cont">
		<? include_once "$path/private/header.php"; ?>
		 <main>
			 <div class="main__in">
				<div class="main__in__menu">
					<?


					//$db=new mysqli("localhost","root","","web115"); db.php
					// в данной переменной содержится подключение к базе данных

						$query=$db->query("SELECT * FROM cat WHERE `status`=1 ORDER BY `name`");
						// $db->query -здесь мы выполнили запрос от нашего подключения. query - так и переводится 
						// запрос. Тоже самое, если бы мы писали данную команду в phpMyAdmin во вкладке SQL
						// сохранили запрос в переменной $query

						foreach($query as $row){ // while($row=$query->fetch_assoc())
						// c помощью цикла прогоняем наш запрос, так как запрос в себе содержит несколько строк из 
						// таблицы в нашей базе данных. где $row - это строка в таблице, а индекс $row- это колонка 
						// в таблице. допустим: $row['name'] - содержит в себе значение из таблицы (из колонки name)
						?>
						
							<div class="main__in__menu__change modalAction">
								<div>x</div>
								<div><?echo $row['name']; ?></div>
							</div>
						<?} ?>

					
				
			
				</div>
				<div class="main__in__content">
					<div id="modal_window" class="modalAction">
						Modal Window
					</div>
				</div>

			 </div>
		 </main>
		 <? include_once "$path/private/footer.php"; ?>

	 </div>
	 <script>
		 const menuChange= document.querySelectorAll(".modalAction");
		 let len=menuChange.length;
		 for(let i=0;i<len;i++){
			menuChange[i].onmouseover=function(event){
				modal_window.style.display="block";
				console.log(event);
				
			}
			menuChange[i].onmouseout=function(){
					
					modal_window.style.display="none";
			
				
			}
		 }
		 





		
		//  document.querySelector(".main__in__menu__change").onmouseover=function(){
		// 	modal_window.style.display="block";
		//  }
		//  document.querySelector(".main__in__menu__change").onmouseout=function(){
		// 	modal_window.style.display="none";
		//  }
	 </script>
</body>
</html>
