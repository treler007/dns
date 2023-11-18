<?
function debug($value = null){
    echo "<div style='color:orange;background:black;'>";
    echo "<br>";
    echo "<details value='ff'><summary><b>Массив SESSION</b></summary><br><pre style='margin-left:15px;'>";
    echo "<b>session_id - по умолчанию! Определяется автоматически. так же сохраняется в куки</b><br>";
    echo session_id()."<br>";
    if(isset($_SESSION)){
         print_r($_SESSION);  
    }
    else{
        echo "Данных по сессии нет!";
    }
 
    echo "</pre></details><br>";

    echo "<br><br><details value='ff'><summary><b>Массив POST</b></summary><br><pre style='margin-left:15px;'>";

  
    print_r($_POST);
    echo "</pre></details><br>"; 
    
    echo "<br><br><details value='ff'><summary><b>Массив GET</b></summary><br><pre style='margin-left:15px;'>";


    print_r($_GET);
    echo "</pre></details><br>"; 
    echo "<br><br><details value='ff'><summary><b>Массив COOKIE</b></summary><br><pre style='margin-left:15px;'>";
  
    print_r($_COOKIE);
    echo "</pre></details><br>"; 
    echo "<br><br><details value='ff'><summary><b>Массив FILES</b></summary><br><pre style='margin-left:15px;'>";
  
    print_r($_FILES);
    echo "</pre></details><br>"; 

    if(isset($value)){
        echo "<br>Проверка переданного значения:";

        echo "<pre style='margin-left:15px;'>";
        print_r($_GET);
        echo "</pre><br>"; 
    }
 



    echo "</div><br>";
 
}
function i($value = null){
    debug($value);
}
