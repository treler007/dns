<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="/js/jq.js"></script>
    <style>
        .table{
            border:5px solid black;
            height: 300px;
            width: 400px;
        }
        .td{
            background: gainsboro;
        }
        .box2{
            background: black;
            color:white;
        }
        .superClass{
            background: gray;
            color:pink;
        }
    </style>
</head>
<body>
    <div id="box1"></div>
    <div id="box2" class="box2">Hello</div>
    <div id="box3" class="box3">box3</div>
    <script>
        box2.onclick=()=>{
          box2.classList.toggle("superClass");  
        }
        let box3H1=document.createElement("h1");
        let H1Text=document.createTextNode("Привет из JS");
        let contDiv=document.createElement("div");
        box3H1.append(H1Text);
        box3.append(box3H1);
        box3.before(contDiv);
        // append- как дочерний элемент (в конец)
        // prepend- как дочерний элемент (в начало)
        // before- создает элемент до элемента box3
        // after - создает элемент после элемента box3
        /*
            кто создает - node
            что создает - new

            append 
            <node>
                <div></div>
                <new></new>
            </node>

            prepend 
            <node>
                <new></new>
                <div></div>
                <div></div>
            </node>

            before 
             <new></new>
            <node>
                <div></div>
                <div></div>
                <div></div>
            </node>

            after
            <div></div>
            <node>
                <div></div>
                <div></div>
                <div></div>
            </node>
            <new></new>


        */
    window.onclick=()=>{
        
         $.ajax({
            url:"/index2.php",
            success:data=>{
                box1.innerHTML=data;
              // let json=JSON.stringify(data);
                console.log(data);
               // console.log(json);

                let jsonInObj=JSON.parse(data);
                console.log(jsonInObj);
                let h3=document.createElement("h3");
                let textH3=document.createTextNode("Вывод из PHP");
                h3.appendChild(textH3);

                box1.appendChild(h3);

                let table1=document.createElement("table");
                let tr1=document.createElement("tr");
                let tr2=document.createElement("tr");
               let td1= document.createElement("td");
               let td2= document.createElement("td");
               let td3= document.createElement("td");

               table1.appendChild(tr1);
               table1.appendChild(tr2);
               tr1.appendChild(td1);
               tr1.appendChild(td2);
               tr1.appendChild(td3);
               box1.appendChild(table1);
                
               table1.classList.add("table");
               table1.id="tab1";

               td1.classList.add("td");
               td2.classList.add("td");
               td3.classList.add("td");

               td21=td1.cloneNode();
               td22=td1.cloneNode();
               td23=td1.cloneNode();
               tr2.appendChild(td21);
               tr2.appendChild(td22);
               tr2.appendChild(td23);

               td1.innerHTML="Товары";
               td2.innerHTML="Цена";
               td3.innerHTML="id товара";

               td21.innerHTML=jsonInObj.name;
               td22.innerHTML=jsonInObj.price;
               td23.innerHTML=jsonInObj.cat_id;





            }
        })
    }
       let master=document.createElement("div");
        for(let i=1;i<=5;i++){
            let divv=document.createElement("div");
            divv.classList.add("newClass");
            master.appendChild(divv);
        }
        box3.append(master);
    </script>
  
</body>
</html>