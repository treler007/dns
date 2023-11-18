<?
    session_start();
	$path=$_SERVER['DOCUMENT_ROOT'];
	require_once "$path/sys/db.php";


?>
<!DOCTYPE html>
<html lang="en">
<? include_once "$path/private/head.php"; ?>
<body>
	 <div class="cont">
		<? include_once "$path/private/header.php"; ?>
		 <main>
            <div class="main__cart">
                <div class="main__cart__left">
                    <h1>Корзина</h1>
                    <div class="main__sum">
                        <div></div>
                        <div></div>
                    </div>
                    <div class="main__product">
                        
                    
                    
                    </div>
                </div>
                <div class="main__cart__right">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
		 </main>
		 <? include_once "$path/private/footer.php"; ?>

	 </div>
     <script>
        fetch("/sys/showCart.php")
        .then(response => response.json())
        .then(data=> {
            let insertElement=document.querySelector(".main__product");
            for(let row of data){
                let newDiv = document.createElement("div");
                newDiv.classList.add("productsCart");
                newDivAfter=document.createElement("div");
                
                newDiv.innerHTML=`<div class="productsCart__img"> img </div>
                        
                        <div class="productsCart__content">
                        <div class="productsCart__content__row1">
                          <div class=" productsCart__content__title">${row.name}</div> 
                            <div class="productsCart__content__delete" data-product-id = ${row.id}> deleteProducts </div>
                        </div> 
                        <div class="productsCart__content__row2">
                        <div class="productsCart__content__desc"> desc</div>
                        </div>
                        <div class="productsCart__content__row3">
                          <div class="productsCart__content__price">${row.price}  </div> 
                            <div class="productsCart__content__count"> кол-во:${row.count}</div> 
                            <div class="productsCart__content__sum" data-card-sum=${row.id}> ${row.price * row.count } </div> 
                        </div>
                          
                        </div>`;
                newDivAfter.innerHTML=`
                <div class="plusProduct" data-product-id = ${row.id} data-product-price=${row.price}>
                +
                </div>
                <div class="totalCount">
                ${row.count}
                </div>
                <div class="minProduct" data-product-id = ${row.id} data-product-price=${row.price}>
                -
                </div >
                
                `; 
                newDivAfter.classList.add("calcButtonscard");       
                newDiv.setAttribute("data-card-id",row.id);
                newDivAfter.setAttribute("data-card-id",row.id);
                insertElement.append(newDiv);
                newDiv.after(newDivAfter);
               // insertElement.innerHTML += `<div>${row.name}кол-во:${row.count}</div>`;
                
            }
        })
        .then(()=>{
            let insertElement = document.querySelector(".main__product");
            insertElement.onclick = data => {
                //console.log(data)
                function movingGoods(action){
                    fetch(`/sys/movingGoods.php?action=${action}&productid=${data.target.dataset.productId}`)
                    .then(response=> response.text())
                    .then(dataDB =>{
                        if(dataDB == "true"){
                            
                         // console.log("win");
                          if(action == 1){
                            data.path[1].childNodes[3].innerText = Number(data.path[1].childNodes[3].innerText)+1 ;
                          }
                          else{
                            data.path[1].childNodes[3].innerText = Number(data.path[1].childNodes[3].innerText)-1 ;
                          }
                          document.querySelector(`[data-card-sum="${data.target.dataset.productId}"]`).innerText = Number(data.path[1].childNodes[3].innerText ) * Number(data.target.dataset.productPrice) ;
                          let totalSum = 0;
                           for(let x of document.querySelectorAll("[data-card-sum]")){
                                totalSum += Number(x.innerText);
                           }
                        
                           document.querySelector(".main__cart__right").innerHTML = totalSum;
                           console.log(totalSum);
                        }
                        else{
                            console.log(`error:${data}`);
                        }
                    })

                    

                    }
               
                
                if(data.target.className=="plusProduct"){
                    movingGoods(1);
                }
                else if(data.target.className=="minProduct"){
                    movingGoods(2);
                }
                else if(data.target.dataset.productId){
                    // fetch(`/sys/deleteProductsCart.php`, {  
                    //     method: 'post',  
                    //     headers: {  
                    //     "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"  
                    //     },  
                    //     body: `id=${data.target.dataset.productId}` 
                    // })
                    fetch(`/sys/deleteProductsCart.php?id=${data.target.dataset.productId}`)
                    .then(() => {
                        console.log(data.target.dataset.productId);
                        let deleteCard=document.querySelectorAll(`[data-card-id="${data.target.dataset.productId}"]`);
                         for(let elem of deleteCard){
                            insertElement.removeChild(elem);
                         }
                       
                   });
                }
            


            }
        });
     
     </script>

</body>
</html>
