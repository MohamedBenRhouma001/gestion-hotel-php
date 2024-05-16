function topicSection(){
    document.querySelector('.messages').style.display ="none" ; 
    document.querySelector('.MainSection').style.display ="none" ;
    document.querySelector('.Client').style.display ="none" ;
    document.querySelector('.topicsSection').style.display ="block" ;
    document.querySelector('.topicmain').style.display ="block" ;
    document.querySelector('.Setup1').style.display ="none" ;   
    document.querySelector('.Setup2').style.display ="none" ;   
}
function openclient(){
    
    document.querySelector('.MainSection').style.display ="none" ;
    document.querySelector('.Client').style.display ="block" ;
    document.querySelector('.topicsSection').style.display ="none" ;
    document.querySelector('.messages').style.display ="none" ;  
}
function openmessages(){

    document.querySelector('.msg-resive').style.display = "none" ;
    document.querySelector('.msgmain').style.display = "block" ;
    document.querySelector('.msgFormC').style.display ="none" ;
    document.querySelector('.MainSection').style.display ="none" ;
    document.querySelector('.topicsSection').style.display ="none" ;  
    document.querySelector('.Client').style.display ="none" ;
    document.querySelector('.messages').style.display ="block" ;   
}


function dernierEtat(){
    
    document.querySelector('.msg-resive').style.display = "none" ;
    document.querySelector('.msgmain').style.display = "block" ;
    document.querySelector('.msgFormC').style.display ="none" ;
    document.getElementById('MainSection').style.display ="none" ;
    document.querySelector('.topicsSection').style.display ="none" ;  
    document.querySelector('.Client').style.display ="none" ;
    document.querySelector('.messages').style.display ="block" ;   
}

function settingSection(){
    document.querySelector('.messages').style.display ="none" ; 
    document.querySelector('.Client').style.display ="none" ;
    document.querySelector('.MainSection').style.display ="block" ;
    document.querySelector('.topicsSection').style.display ="none" ;   
}
function StartMakingTopic(){
    document.querySelector('.messages').style.display ="none" ; 
    document.querySelector('.Client').style.display ="none" ;
    document.querySelector('.addroom').style.display ="block" ;
    document.querySelector('.Setup1').style.display ="block" ;
    document.querySelector('.topicmain').style.display ="none" ; 
    document.querySelector('#btn1').style.display ="none" ;    
}

function StartupdateTopic(id){
    console.log('------------------------id--------------------------');
    console.log(id);
    document.querySelector('.messages').style.display ="none" ; 
    document.querySelector('.Client').style.display ="none" ;
    document.querySelector('.addroom').style.display ="block" ;
    document.querySelector('.Setup1').style.display ="block" ;
    document.querySelector('.topicmain').style.display ="none" ; 
    document.querySelector('#btn').style.display ="none" ; 
    document.querySelector('#btn1').style.display ="block" ;  
    document.getElementById('id-room-modi').value =id ;    
}

function sessiondestroy(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

        setTimeout(() =>{
            document.location.reload();
            }, 100
        
            );
     }
    }
    xhttp.open("GET", "php/sessiondestory.php", true);
    xhttp.send();
}
function checkmsg(id){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.querySelector('.msgmain').style.display = "none" ;
        document.querySelector('.msgFormC').style.display = "block" ;
        console.log(this.response) ;
         const input = this.response ;
         const names = input.slice(0).split("+");
         var nameLength = names.length ;
         for(let i = 0 ; i < nameLength ; i++){
            switch(i){
                case 0 :
                    console.log(names[i]) ;
                    document.querySelector('#msguser').innerHTML = ""+names[i]+"" ;
                    break ;
                case 1 :
                        document.querySelector('#imageUser').src = "../"+names[i] ;
                break ;
                case 2 :
                    console.log(names[i])  ;
                break ;
                case 3 :
                    document.querySelector('#msgcontent').innerHTML = names[i] ;
                    break ;
                case 4 :
                    console.log(names[i]) ;
                    document.querySelector('#id_userFormsg').value = names[i] ;
                    break ;
            }
         }
         
     }
    }
    xhttp.open("GET", "php/GetMsgInfo.php?id="+id+"", true);
    xhttp.send(); 
}
function SaveReply(){

    var reply = document.querySelector('#replyMsg').value ;
    if (reply!=""){
    var id = document.querySelector('#id_userFormsg').value ;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        if(this.response == '1'){
             document.querySelector('.msg-resive').style.display = 'block';
             document.querySelector('#reply_ms').style.display = 'none';

              setTimeout(function() {
               
                document.cookie = "etat=test; expires=" + new Date((new Date()).getTime() + 3600).toUTCString();
                document.location.reload();
              }, 300);
              
        }
             
     }
    }
    xhttp.open("GET", "php/sendReply.php?id="+id+"&reply="+reply+"", true);
    xhttp.send();    }else{
window.alert('Desole c est vide');
    }
}