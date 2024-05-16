function checklogin() {
    var email = document.querySelector('#email').value ;
    var password = document.querySelector('#password').value ;
    var xhttp = new XMLHttpRequest();
           xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        
        console.log(this.response);
    document.querySelector('#login-s').style.display="none" ;
    document.querySelector('#loading_screen').style.display="block" ;
    setTimeout(() =>{
        if(this.response == 1) {
        document.querySelector('#login-succ').style.display="block" ;
        document.querySelector('#login-error').style.display="none" ;
    }else{
        document.querySelector('#login-succ').style.display="none" ;
        document.querySelector('#login-error').style.display="block" ;    
    } 
}, 1500);

setTimeout(() =>{
    if(this.response == 1){
        document.location.reload(); 
        document.querySelector('.header').style.display = "block" ;
        document.querySelector('.MainSection').style.display = "block" ;
        document.querySelector('.loginForm').style.display = "none" ;
    }
    else{
    document.location.reload(); 
    }
}, 2200);


    }
    };
  
  xhttp.open("GET", "php/login.php?email="+email+"&psw="+password+"", true);
  xhttp.send();

}