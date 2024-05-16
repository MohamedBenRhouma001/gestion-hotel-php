function bringSetupinfpics(){
    var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) { 

    const input = this.response ;
     const names = input.slice(1).split("+");
     var nameLength = names.length ;
     var Element = "";
     for(let i = 0 ; i < nameLength ; i++){
        if(names[0] !== ""){
        if(names[i] !== ""){
        const para = document.createElement("li"); 
        para.innerHTML = names[i];
        document.getElementById("showlistes").appendChild(para);
    }}
     }

} ;
}
xhttp.open("GET", "php/TopicCheck.php?tag=pic", true);
xhttp.send();

}


function bringSetupinftags(){
    var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) { 
    const input = this.response ;
// Remove the initial "+" character, then split the string by "+"
     const names = input.slice(1).split("+");
     var nameLength = names.length ;
     var Element = "";
     for(let i = 0 ; i < nameLength ; i++){
        if(names[0] !== ""){
            if(names[i] !== ""){
            const para = document.createElement("li"); 
            para.innerHTML = names[i];
            document.getElementById("idtags").appendChild(para);
        }}
     }

} ;
}
xhttp.open("GET", "php/TopicCheck_v2.php?tag=pic", true);
xhttp.send();

}

function savetopicSetup1(){
    var title = document.querySelector('#roomtitle').value  ;
    var descr = document.querySelector('#roomDescr').value  ;
    var maxnbr = document.querySelector('#maxnbr').value  ;
    var quantite = document.querySelector('#quantite').value  ;
    var price = document.getElementById('price1253').value  ;

    if(title!=""  && descr!=""  && maxnbr!=""  && quantite!=""  && price!="" ){

    var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) { 
  
    if(this.response == 1) {
        document.querySelector('.Setup1').style.display ='none' ;
        document.querySelector('.Setup2').style.display ='block' ;
        bringSetupinfpics() ;
        bringSetupinftags() ;
    }else{
        document.querySelector('.Setup1').style.display ='none' ;
        document.querySelector('.AddRoomResult').style.display ='block' ;
        document.querySelector('.add_Error').style.display ='block' ; 
    }
}

};

xhttp.open("GET", "php/addtopic.php?title="+title+"&descr="+descr+"&maxnbr="+maxnbr+"&quantite="+quantite+"&price="+price+"", true);
xhttp.send();

}else{
    window.alert('Desole c est vide');
        }}

function addimage(){
    var link = document.querySelector('#imagelinkFFF').value ;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) { 
        if(this.response == 1) {
            const para = document.createElement("li"); 
            para.innerHTML = link;
            document.getElementById("showlistes").appendChild(para);
            /* showlinks(link) ; */
        }  
    
    } ;
    }
    xhttp.open("GET", "php/TopicCheck.php?tag=insert&link="+link+"", true);
    xhttp.send(); 
}


function addtags(){
    var link = document.querySelector('#tagsInput').value ;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) { 
        if(this.response == 1) {
            const para = document.createElement("li"); 
            para.innerHTML = link;
            document.getElementById("idtags").appendChild(para);
            /* showlinks(link) ; */
        }  
    
    } ;
    }
    xhttp.open("GET", "php/TopicCheck_v2.php?tag=insert&link="+link+"", true);
    xhttp.send(); 
}

function save_fun_v1(){
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) { 
    console.log(this.response);
if (this.response == 1)
{
document.querySelector(".AddRoomResult").style.display="block";
document.querySelector(".add_succ").style.display="block";
document.querySelector(".add_Error").style.display="none";
document.querySelector(".setup2").style.display="none";


}else{
document.querySelector(".AddRoomResult").style.display="block";
document.querySelector(".add_succ").style.display="none";
document.querySelector(".add_Error").style.display="block";
document.querySelector(".setup2").style.display="none";
    
}  

setTimeout(function() {
               
  document.location.reload();
  }, 300);

} 
}
xhttp.open("GET", "php/TopicUpdate.php", true);
xhttp.send(); 
}
function DeleteTopic(id){
    var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) { 
    if(this.response == 1){
        showTopic() ;

    }
} ;
}
xhttp.open("GET", "php/DeleteTopic.php?id="+id+"", true);
xhttp.send(); 
}

function Deletemsg(id){
    var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) { 
    if(this.response == 1){
        getallmessages() ;

    }
} ;
}
xhttp.open("GET", "php/DeleteMasg.php?id="+id+"", true);
xhttp.send(); 
}


function deleteclient(id){
    var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) { 
    if(this.response == 1){
        getallclient();

    }
};
}
xhttp.open("GET", "php/deleteclient.php?id="+id+"", true);
xhttp.send(); 
}

function upd_car_app(){
    var code = document.querySelector('#code').value ;
    var price = document.querySelector('#price').value ;
    var duration = document.querySelector('#duration').value ;

    if (code!="" && price!="" && duration!=""){
    var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) { 
    console.log(code);
    console.log(price);
    console.log(duration);
    console.log(this.response)
    if(this.response == 1){
        document.querySelector('#correct').style.display="Block" ;
        setTimeout(() =>{
            document.location.reload();
            }, 300
        
            );
    }else{
        document.querySelector('.settingmsgError').style.display="Block" ;
    }
    
};
}
xhttp.open("GET", "php/upd_car_app.php?code="+code+"&price="+price+"&duration="+duration+"", true);
xhttp.send(); 
}else{
    window.alert('Desole c est vide');
        }
}


function uptopicSetup1(){
    var title = document.querySelector('#roomtitle').value  ;
    var descr = document.querySelector('#roomDescr').value  ;
    var maxnbr = document.querySelector('#maxnbr').value  ;
    var quantite = document.querySelector('#quantite').value  ;
    var price = document.getElementById('price1253').value  ;
    var id =  document.getElementById('id-room-modi').value ;

    if(title!=""  && descr!=""  && maxnbr!=""  && quantite!=""  && price!="" ){

    var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) { 
    console.log('-----------------------room-------------------');
    console.log(id);
    console.log(this.response);
    console.log(price);
    if(this.response == 1) {
        document.querySelector('.Setup1').style.display ='none' ;
        document.querySelector('.Setup2').style.display ='block' ;
        bringSetupinfpics() ;
        bringSetupinftags();
    }else{
        document.querySelector('.Setup1').style.display ='none' ;
        document.querySelector('.AddRoomResult').style.display ='block' ;
        document.querySelector('.add_Error').style.display ='block' ; 
    }
}

};

xhttp.open("GET", "php/uptopic.php?id="+id+"&title="+title+"&descr="+descr+"&maxnbr="+maxnbr+"&quantite="+quantite+"&price="+price+"", true);
xhttp.send();

}else{
    window.alert('Desole c est vide');
        }}