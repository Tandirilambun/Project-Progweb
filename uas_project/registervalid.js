window.onload = function(){

    var password = document.getElementById('password');

    var form = document.getElementById('regis-form');

    password.onkeyup = function(){
        
        //pengambilan data
        var value = password.value;
        var panjangError = document.getElementsByClassName('error-password')[0];
        var lowercaseError = document.getElementsByClassName('error-password')[1];
        var uppercaseError = document.getElementsByClassName('error-password')[2];
        var uniqueError = document.getElementsByClassName('error-password')[3];

        //Pengecekan panjang text
        if(value.length < 3 || value.length > 10){
            panjangError.style.color = "red";
        }else{
            panjangError.style.color = "green";
        }

        //pengecekan lowercase
        lowercaseError.style.color="red"
        for(let index = 0; index<value.length; index++){
            const element = value[index];
            if(isNaN(parseInt(element))){
                if(element == element.toLowerCase()){
                    lowercaseError.style.color="green";
                    break;
                }
            }
        }

        //pengecekan uppercase
        uppercaseError.style.color="red"
        for(let index = 0; index<value.length; index++){
            const element = value[index];
            if(isNaN(parseInt(element))){
                if(element == element.toUpperCase()){
                    uppercaseError.style.color="green";
                    break;
                }
            }
        }

        uniqueError.style.color="red"
        for(let index = 0; index<value.length; index++){
            const element = value[index];
            if(element == '!' || element == '?' || element == ',' ||element == '.'){
                uniqueError.style.color="green";
                break;
            }
        }

    }

}