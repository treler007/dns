<?
	$path=$_SERVER['DOCUMENT_ROOT'];
	require_once "$path/sys/db.php";

    if(empty($_GET['page'])){
        header("Location: page.php?page=1&limit=5");
    }

    //$_GET['page']=1;
  //  $_GET['limit']=5;
  
   $offset=$_GET['limit']*($_GET['page']-1);
    $count_msg=$db->query("SELECT id FROM `msg`");
    $count_msg=$count_msg->num_rows;
    
    
  
    $query=$db->query("SELECT * FROM `msg` LIMIT $_GET[limit] OFFSET $offset");
    foreach($query as $row){
    
        echo "$row[id]: $row[msg] <br>";
    }
    var_dump($_GET);
    echo "<br> <br>";
    $allPage=ceil($count_msg/$_GET['limit']);
    // for($i=1;$i<=$allPage;$i++){
    //     echo "<a href='page.php?limit=$_GET[limit]&page=$i'>";
    //     if($_GET['page']==$i){
    //         echo "<b>$i</b>";
    //     }
    //     else echo $i;
    //     echo "</a> ";  1...4 5 6...10
    // }
    $pre=$_GET['page']-1;
    $next=$_GET['page']+1;
        echo "<a href='page.php?limit=5&page=1'> << </a> <a href='page.php?limit=5&page=$pre'> < </a> ";
    for($i=1;$i<=$allPage;$i++){
        if($i==1){
           
            if($i==$_GET['page']){
                echo "<b> $i </b> ";
            }
            else  echo " $i ";
        }
       
        else if($i>=$_GET['page']-1 && $i<=$_GET['page']+1){
         
            if($i==$_GET['page']){
                echo "<b> $i </b> ";
            }
            else echo " $i ";
        }
        else if($i==$allPage){
            echo " $i ";
        }
        else if($i==$_GET['page']-2 || $i==$_GET['page']+2){
            echo "...";
        }


        
      
    }
    echo " <a href='page.php?limit=5&page=$next'> > </a> <a href='page.php?limit=5&page=$allPage'> >> </a> ";

    if(isset($_POST['changePage'])){
        header("Location: page.php?limit=$_GET[limit]&page=$_POST[changePage]");
    }
   
?>
 <form action="" method="post">
        <input type="number" name="changePage" id="">
 </form>