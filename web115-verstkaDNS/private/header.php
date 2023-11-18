<?

?>
<header>
			 <div class="header__top">
				<div>
					<!-- header__top>div:nth-child(1) -->
					<div>Москва</div>
					<div>
						<span>Магазины</span>
						<span>Покупателям</span>
						<span>Клуб Store</span>
					</div>
					<div>8-800-77-07-999 (c 08:00 до 03:00)</div>
				</div>
			 </div>
			 <div class="header__bottom">
				<div class="header__bottom__in">
					<!-- header__top>div:nth-child(2) -->
					<div>Store</div>
					<div><form action="/public/search.php" method="get"><input autocomplete="off"type="text" id="searchHeader"name="searchHeader"placeholder="Поиск по сайту">
				
				<!-- МОДАЛЬНОЕ ОКНО ДЛЯ ВЫВОДА ИНФОРМАЦИИ ИЗ БАЗЫ ДАННЫХ!  -->
						<div id="modalHeaderAjax" hidden></div>
				<!-- КОНЕЦ: МОДАЛЬНОЕ ОКНО ДЛЯ ВЫВОДА ИНФОРМАЦИИ ИЗ БАЗЫ ДАННЫХ!  -->	

					</form></div>
					<div>
						<div> <img src="/img/checklist.png" width="15px" height="15px"> Cравнить</div>
						<div> <img src="/img/heart.png" width="15px" height="15px">Избранное</div>
						<div> <img src="/img/cart.png" width="15px" height="15px">Корзина</div>
						<div id="enterModal" class="closeModal " > <img src="/img/user.png" width="15px" height="15px">
							
						
						<div id="showModal" class="closeModal" data-closeModal>
<?php
	if(isset($_SESSION['login'])){ 
?>
<!-- Проверяем, есть ли у нас такая сессия. Если есть. то выводим в модальном окне следующий код -->
<a class="closeModal" data-closeModal href="#">Profile</a>
<a class="closeModal" data-closeModal href="#">Edit</a>
<div id='closeModal'> x </div>
	<?if(isset($_SESSION['status'])&&$_SESSION['status']==1){
		echo "<a class='closeModal' data-closeModal href='admin.php'>Admin</a>	";
	}?>
<form action="" method="post"> <!-- Форма нам нужна для лотправки пост=-запроса на сервер -->
	<input type="submit" name="logOut" value="Exit">
</form>
<?php
// Проверяем, если нажат кнопка Выход из формы с пост-запросом, то делаем выход из всех сессий и переадресацию на стратовую страницу
	if(isset($_POST['logOut'])){
		$_SESSION['login']=NULL; // Ставим значение 0
		$_SESSION['auth']=NULL; // Ставим значение 0
		header("Location: ../index.php");
	} ?>
<?php } else { ?>
<!-- Ниже код показывает стартвоые элементы, когда нет активных сессий -->
<a class="closeModal" data-closeModal href="/public/login.php">Log In</a>
<a class="closeModal" data-closeModal href="/public/signup.php">Sign Up</a>
<?php }
?>
</div>

							<?
							if(isset($_SESSION['auth'])){
								if($_SESSION['auth']==true){
									echo "<span id='profile'> $_SESSION[login]</span>";
								}
								else echo "Войти";
							}
								
							?>
						</div>
					</div>
				</div>
			 </div>
		 </header>
		 
		 <script>
			 // данный JS код работает через библиотеку jquery 
			 // работает за счет событий на поле ввода в header 
			 // по нажатию клавиши проверяет товары и категории в нашей базе данных
			 
			//  enterModal.onmouseover=function(){
			// 	 showModal.style.display="grid";
			// 	setTimeout(()=>{
			// 		showModal.style.transform="scale(1)";
			// 	},50);
				
			//  }

			// showModal.onmouseout=function(event){

			// 	if(event.target.className!="closeModal"){
			// 		showModal.style.transform="scale(0)";
				
			// 		setTimeout(()=>{
			// 			showModal.style.display="none";
			// 		},400);
			// 	}
			// 	console.log(event);

			// }
			enterModal.onclick=()=>{
				 showModal.style.display="grid";
				setTimeout(()=>{
					showModal.style.transform="scale(1)";
				},50);

			}
			closeModal.onclick=event=>{
			
				
					showModal.style.transform="scale(0)";
				
					setTimeout(()=>{
						showModal.style.display="none";
					},400);

				
			}
		
			 searchHeader.oninput=()=>{

				// проверяем поле ввода на кол-со символов! Что позволяет отправлять запросы реже к нашей базе данных

				 if(searchHeader.value.length>1){
					 
					$.ajax({
						type:"get",
						url:"/sys/search_back.php",
						data:{
							// слева свойство которое встречаем в файле search_back.php как $_GET['searchHeaderAjax']
							//cправа значение из поля ввода
							"searchHeaderAjax":searchHeader.value
						},
						success:x=>{
							//success- что делаем после операции запроса! x- содержит в себе ответ из страницы search_back.php

						
							modalHeaderAjax.hidden=false;

							// грубо говоря вставляем результат из страницы search_back.php в модальное окно
							modalHeaderAjax.innerHTML=x;

						}
						
					})  
				 }
				 else{
					// очищаем модальное окно, если символов меньше 2
					modalHeaderAjax.innerHTML="";

				 }
				
			 }
			 document.onclick=event=>{
				 //отключаем модальное окно, если клик был в другой области! 
				 if(event.target.id!="modalHeaderAjax")modalHeaderAjax.hidden=true;
			 }
		 </script>