var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {   
    console.log("---------------------------yes--------------------------------");
    console.log(this.response);
    if(this.response == 1){

        document.querySelector('.header').style.display = "block" ;
        document.querySelector('.MainSection').style.display = "block" ;
    }
    else if(this.response ==0){

        document.querySelector('.loginForm').style.display = "block" ;
    }else if(this.response ==2){
        document.querySelector('.header').style.display = "block" ;
        dernierEtat();
    }else if(this.response ==3){
        console.log("---------------------------yes--------------------------------");
        document.querySelector('.header').style.display = "block" ;
        topicSection();
    }

 };
}
xhttp.open("GET", "php/sessioncheck.php", true);
xhttp.send();

function getallmessages(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
  
        if (this.readyState == 4 && this.status == 200) { 

       document.querySelector("#showmsgall").innerHTML = this.response ;
         };
        }
        xhttp.open("GET", "php/message.php", true);
        xhttp.send();
}
function num_message(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) { 
            document.querySelector('.notiv').innerHTML =this.response ;

        };
        }
        xhttp.open("GET", "php/countmsg.php", true);
        xhttp.send();
        
}

function showTopic(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {   
        document.querySelector("#showtopicsall").innerHTML = this.response ;
         };
        }
        xhttp.open("GET", "php/Topics.php", true);
        xhttp.send();
        
}
function getallclient(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) { 
        document.querySelector("#showclientall").innerHTML = this.response ;
         };
        }
        xhttp.open("GET", "php/client.php", true);
        xhttp.send();
}


getallclient();
getallmessages() ;
showTopic() ;
num_message() ;
