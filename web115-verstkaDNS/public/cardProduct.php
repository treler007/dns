<?

// $feedback = $db -> query("SELECT * FROM feedback WHERE product_id = $_GET[productid]");
// if($feedback -> rowCount() > 0){
//     foreach($feedback as $rows){
//         echo "{$rows['feedback']}<br>";
//     }
// }
// else{
//     echo "Можете оставить первый отзыв!";
// }



?>
<script>
fetch('/sys/getProductCard.php',{
    method:'POST',
    headers:{'Content-Type':'application/x-www-form-urlencoded'},
    body: `productid=<?echo $_GET['productid'];?>`
})
.then(response => response.json())
.then(data => console.log(data));

fetch('/sys/getFeedback.php',{
    method:'POST',
    headers:{'Content-Type':'application/x-www-form-urlencoded'},
    body: `productid=<?echo $_GET['productid'];?>`
})
.then(response => response.json())
.then(data => {
    for(let r of data){
        console.log(r.feedback);
    }
});



</script>
