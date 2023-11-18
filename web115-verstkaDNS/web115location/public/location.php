<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        <select name="country" id="country">
            <option value="0">Все страны</option>
        </select>
        <br><br>
        <select name="state" id="state">
             <option value="0">Все регионы</option>
        </select>
        <br><br>
        <select name="city" id="city">
             <option value="0">Все города</option>
        </select>
        <br><br>
        
    </form>
    <hr>
    <form action="" method="post" id='signupForm'>
        <input type="text" name="login" id="login">
        <input type="file" name="file" id="file">
        <input type="submit" value="Sign Up" id="signup" name="signup">


    </form> 
    <br>
    <hr>
    <!-- <details>
        <summary>Открыть</summary>
        <h3>Hello</h3>
    </details> -->

    <input type="file" name="file2" id="file2" >
    <div id="uploadFile">upload</div>
    <br><br>
    <hr>
    <div id="fetchBox">
        <input type="text" id="loginFetch"><br>
        <input type="number" id="ageFetch"><br>
        <div id="saveInFetch">
            save
        </div>
    </div>
    <script>
        saveInFetch.onclick = () =>{
               let person ={
        login:loginFetch.value,
        age:ageFetch.value,
        location:{
            country:"Russy",
            region:"Miscow",
            city:"Moscow"
               }
           }


         fetch("/setPerson",{
           method:"post",
           headers:{"Content-type":"application/json"},
           body: JSON.stringify(person)
           
         })
         .then(response => response.text())
         .then(data => console.log(data))
     }



   
    uploadFile.onclick = ()=>{
        let newForms = new FormData();
        newForms.append('file', file2.files[0]); // $_FILES
        newForms.append('login','bobik');  // $_POST
        
        fetch("/setUser2",{
                method:"post",
                body: newForms
        })
        .then(response => response.text())
        .then(data => console.log(data));



    }









        signupForm.onsubmit = event =>{
          //  event.preventDefault();
            let $forms = new FormData(signupForm);
            fetch("/setUser",{
                method:"post",
                body: $forms
            })
            .then(response => response.text())
            .then(data => console.log(data));
            return false;
        }
   



























        function addOption(parent, content, value){
            newOption = document.createElement("option");
            newOption.innerHTML = content;
            newOption.setAttribute('value',value);
            parent.append(newOption);
        }

        fetch("/getCountry")
        .then(response => response.json())
        .then(data =>{ 
           // console.log(data);

            for(let value of data){
                addOption(country, value.name, value.id );
            }
        });

        country.onchange = ()=> {
            fetch("/getState",{
                method:'post',
                headers:{
                    "Content-type":"application/x-www-form-urlencoded; charset=UTF-8"
                },
                body:`country=${country.value}`  
            })
            .then(response => response.json())
            .then(data =>{ 
                state.innerHTML = null;
                city.innerHTML = null;
                addOption(state,"Все регионы" , 0 );
                addOption(city,"Все города" , 0 );

                for(let value of data){

                    addOption(state, value.name, value.id );
             
                }
            });
        }

        state.onchange = ()=> {
            fetch("/getCity",{
                method:'post',
                headers:{
                    "Content-type":"application/x-www-form-urlencoded; charset=UTF-8"
                },
                body:`state=${state.value}`  
            })
            .then(response => response.json())
            .then(data =>{ 
                city.innerHTML = null;
               
                addOption(city,"Все города" , 0 );
                console.log(data);
                for(let value of data){

                    addOption(city, value.name, value.id );
             
                }
            });
        }

    </script>
</body>
</html>