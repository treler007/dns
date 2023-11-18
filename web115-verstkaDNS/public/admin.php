<?
session_start();
$path=$_SERVER['DOCUMENT_ROOT'];
// $path - содержит в себе путь к файлу с сайтом
require_once "$path/sys/db.php";
// подключение к базе данных web115
echo $_SESSION['status'];
if(isset($_SESSION['status'])){
   if($_SESSION['status']!=1){
    header("Location: search.php");
    } 
}
else{
    header("Location: search.php");
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
                    <div id="menu__products" hidden>Товары</div>
                </div>
            </div>   
		 </main>
		 <? include_once "$path/private/footer.php"; ?>

	 </div>
	 <script>
         listCat.onclick=event=>{
             if(event.target.className=="catRemove"){
                //console.log(event.target.dataset.catid);
                fetch(`/sys/catRemove.php?catremove=${event.target.dataset.catid}`);

             }
         }
         addCatSend.onclick=()=>{
            //  $.ajax({
            //      type:"get",
            //      url:"/sys/addCat.php",
            //      data:{
            //          "addCat":addCat.value //$_GET['addCat']
            //      }
                 
            //  })

              // cоздаем новый шабло подключения
           //  let xhr =new XMLHttpRequest();

             //готовим данные для отправки  и подключения
           //  xhr.open("get",`/sys/addCat.php?addCat=${addCat.value}`,false);
             //xhr.optn ("тип отправки get или post","страница сайта","тип подключения")
             //false -значит асинхронно

             // выполняем операцию! в скобках есть null - это для передачи методом post.
             // так как мы передаем сейчас методом get, поэтому и пишем null для post
            // xhr.send(null);


             fetch(`/sys/addCat.php?addCat=${addCat.value}`);

             addCat.value=null;

         }
         setInterval(()=>{
            // $.ajax({
            //     url:"/sys/showCat.php",
            //     success:data=>{
            //         listCat.innerHTML=data;
            //     }
            // })

            //XHR
            // let xhr1=new XMLHttpRequest();
            // xhr1.open("get","/sys/showCat.php",false);
            // xhr1.send(null);
            // listCat.innerHTML=xhr1.responseText;
            // console.log(xhr1);

            //FETCH
            fetch("/sys/showCat.php")
            .then(response=>response.text())
            .then(data=>listCat.innerHTML=data);



            // responseText- ответ от showCat.php
         },500)


		document.querySelector(".main__admin").onclick=event=>{
            if(event.target.id=="main__cats"){
                // if(menu__cat.hidden==false){
                //     menu__cat.hidden=true;
                // }
                // else{
                //     menu__cat.hidden=false;
                // }
                menu__cat.hidden==false? menu__cat.hidden=true: menu__cat.hidden=false;
            }
            if(event.target.id=="main__products")alert(2);

        }
	 </script>
</body>
</html>
