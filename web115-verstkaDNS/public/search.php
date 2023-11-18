<?
session_start();
$path=$_SERVER['DOCUMENT_ROOT'];
// $path - содержит в себе путь к файлу с сайтом
require_once "$path/sys/db.php";
// подключение к базе данных web115




?>
<!DOCTYPE html>
<html lang="en">
<? include_once "$path/private/head.php"; ?>
<body>
	 <div class="cont">
		<? include_once "$path/private/header.php"; ?>
		 <main>
			 <div class="main__in">
                <div class="main__in__menu main__filter">
                        <h3>Фильтр</h3>
						<form action="" method="post">
							<!-- $_POST['changeProduct'] -->
							<select name="changeProduct" id="">
								<option value="">Выбрать категорию</option>
								<?
									$query=$db->query("SELECT `id`,`name` FROM `cat` ORDER BY `name`");
									// выполняем запрос, чтоб заполнить select - option'aми

									foreach($query as $row){
										// используем цикл, чтоб вывести результаты запроса на страницу! в select
										echo "<option value='$row[id]'>$row[name]</option>";
									}
								?>
							</select>
							<br>
						

							<h4>Цена:</h4>
							<input type="number" name="minPrice" min="0" max="999999" id="minPrice" placeholder="От 0">
							<input type="number" name="maxPrice"min="0" max="999999" id="" placeholder="до 999999">
							<br>
						
							<h4>Поиск по названию:</h4>
							<input type="text" name="searchProduct" id=""><br>
							Товар в наличии <input type="checkbox" name="inStoke" id=""><br>

							<input type="submit" name="search" value="Найти">


						</form>
                    

                        
                    
                
                </div>
				<div class="main__in__content" id="searchPage">
				<?
					if(isset($_GET['searchHeader'])){
						$searchQuery=$db->query("SELECT * FROM `cat` WHERE `name` LIKE '%$_GET[searchHeader]%' ORDER BY `name` ASC");
						$searchQueryProducts=$db->query("SELECT * FROM `products` WHERE `name` LIKE '%$_GET[searchHeader]%' ORDER BY `name` ASC");
						//var_dump($searchQuery);
						// echo "<h2>Результаты поиска: </h2>";
						if($searchQuery->rowCount()>0){
							echo "<h3>Категории: </h3>";
							foreach($searchQuery as $row){
								echo "$row[name] <br>";
							}	
						}

						if($searchQueryProducts->rowCount()>0){
							echo "<h3>Товары: </h3>";
							foreach($searchQueryProducts as $row){
								echo "$row[name] <br>";
							}	
						}

					}

					if(isset($_POST['search'])){
						// если кнопку фильтра нажали! то происходит выполнение кода в теле данного условия!
						// echo "<pre>";
						// var_dump($_POST);
						// echo "</pre>";
						//  НАЧАЛО: ДЛЯ УДОБСТВА РАБОТЫ ЗАПИСЫВАЕМ ПЕРЕМЕННЫЕ!!! в другой вид! 
						$changeProduct=$_POST['changeProduct'];///////////////////
						$minPrice=$_POST['minPrice'];///////////////////
						$maxPrice=$_POST['maxPrice'];///////////////////
						// КОНЕЦ : ДЛЯ УДОБСТВА РАБОТЫ ЗАПИСЫВАЕМ ПЕРЕМЕННЫЕ!!! в другой вид! 


						//НАЧАЛО: Проверяем на пустоту переменные, если они пустые, значит их в фильтре не выбирали, а значит и использовать в запросе не нужно
						if(!empty($changeProduct)){
							$changeProduct=" AND `cat_id`=$changeProduct ";
						}
						if(!empty($minPrice)){
							$minPrice=" AND `price`>=$minPrice ";
						}
						if(!empty($maxPrice)){
							$maxPrice=" AND `price`<=$maxPrice ";
						}
						///////////////// КОНЕЦ проверки /////////////////////////////////////////








						// запрос на основе нашего фильтра!!!! к таблице products

						$search=$db->query("SELECT `name`,`price`,`link_img`,`id` FROM `products` WHERE `status`=1  ORDER BY `name` ");

						// проверяем сколько результатов вернулось! Если вернулось 0 результатов, то и выводить код ниже не надо! 
						$numRows=$search->rowCount();
						if($numRows==0){
							echo "Данных нет!";
						}
						//обрабатываем запрос. Для вывода карточек товара из нашей таблицы

						foreach($search as $row){?>
						
							<div class="productCard">
							
								<div><img src="/img/<?echo $row['link_img'];?>" alt=""></div>
								<div><a href="/card-product?productid=<?echo $row['id']?>"><?echo $row['name']; ?></a></div>
								<div><?echo $row['price']; ?></div>
								<div>description</div>
								<div data-idproduct=<?echo $row['id']?> class="goods">Add to Card</div>
							</div>

						<?}

					}
				?>
				</div>

			 </div>
		 </main>
		 <? include_once "$path/private/footer.php"; ?>

	 </div>
	 <script>
			searchPage.onclick = event =>{
		
		if(event.target.className=="goods"){
			//console.log(event.target.dataset.idproduct);
			fetch("/sys/addProductTocart.php", {  
				method: 'post',  
				headers: {  
				"Content-type": "application/x-www-form-urlencoded; charset=UTF-8"  
				},  
				body: `id=${event.target.dataset.idproduct}`
			   })
			.then(()=>console.log("Успех!"));
			
			 
		}
		//event.target.dataset.idproduct - id продукта который мы будем передавать в базу данных

	}
	 </script>
</body>
</html>
