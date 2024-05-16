function showmsg(){
    document.querySelector('.SendMessageForm').style.display = 'block' ;
    document.getElementById('showallMessages').style.display = 'none' ;
    document.querySelector('.showallrecive').style.display = 'none' ;
    document.querySelector('.MessAgeFORMsHOX').style.display = 'none' ;
    document.querySelector('.mymsg').style.display = 'none' ;
    document.querySelector('#searchMessages').style.display = 'none' ;
  
}
function getuserinfo(url ,div){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var code = this.response ;
        code = code.trim() ;
         document.querySelector(div).value = code ;
      }
    }
    xhttp.open("GET", url, true);
    xhttp.send();
}

function showallmsg(){
    document.querySelector('.SendMessageForm').style.display = 'none' ;

    document.getElementById('showallMessages').style.display = 'none' ;
    document.querySelector('.showallrecive').style.display = 'block' ;
    
    document.querySelector('.MessAgeFORMsHOX').style.display = 'none' ; 
    document.querySelector('.mymsg').style.display = 'none' ;
    document.querySelector('#searchMessages').style.display = 'none' ;
}
function ajaxcode(url ,div ,num){
    let code ;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        code = this.response ;
        code = code.toString() ;
        code = code.replace(/[\n\r]/g, "");
        code = code.trim() ;
        console.log(code);
        if(num == 0){
        document.querySelector(div).innerHTML = ""+code+"" ;
        }
        else{
        document.querySelector(div).src = ""+code+"" ;
        }
      }
    };
    
    // Open the connection and send the request
    xhttp.open("GET", url, true);
    xhttp.send();

}


function entermsg(id ,type) {
    document.querySelector('.SendMessageForm').style.display = 'none' ;
    document.getElementById('showallMessages').style.display = 'none' ;
    document.querySelector('.showallrecive').style.display = 'none' ; 
    document.querySelector('.MessAgeFORMsHOX').style.display = 'block' ; 
    document.querySelector('.mymsg').style.display = 'none' ;
    document.querySelector('#searchMessages').style.display = 'none' ;
    /////  "GetTopicInfo.php?id="+id+""
    //title 
    console.log('-------------------------') ;
    if (type == "moi"){
    var title = ajaxcode("GetTopicInfo.php?id="+id+"&tag=title", "#msgtitleAJAX", 0);
    var message = ajaxcode("GetTopicInfo.php?id="+id+"&tag=message", ".bdyMESG", 0);
    var date = ajaxcode("GetTopicInfo.php?id="+id+"&tag=date", "#datemsgUserAJAX", 0);

    getimg(id);
   
    var senderid =ajaxcode("GetTopicInfo.php?id="+id+"&tag=sender", "#msgUserAJAX",0);
    document.querySelector("#id_topic").value = id;
    console.log(title) ;
}else{

  var title = ajaxcode("GetTopicInfo1.php?id="+id+"&tag=title", "#msgtitleAJAX", 0);
  var message = ajaxcode("GetTopicInfo1.php?id="+id+"&tag=message", ".bdyMESG", 0);
  var date = ajaxcode("GetTopicInfo1.php?id="+id+"&tag=date", "#datemsgUserAJAX", 0);

  getimg1(id);
 
  var senderid =ajaxcode("GetTopicInfo1.php?id="+id+"&tag=sender", "#msgUserAJAX",0);

}

}  
function mymsg() {
    document.querySelector('.SendMessageForm').style.display = 'none' ;
    document.getElementById('showallMessages').style.display = 'none' ;
    document.querySelector('.showallrecive').style.display = 'none' ;
    document.querySelector('.MessAgeFORMsHOX').style.display = 'none' ; 
    document.querySelector('.mymsg').style.display = 'block' ;
    document.querySelector('#searchMessages').style.display = 'none' ;
}

function btndelete(){
  var id = document.querySelector("#id_topic").value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
   console.log(this.response);
   document.querySelector(".deleteMsg").style.display="block";
   document.querySelector(".MessAgeFORMsHOX").style.display="none";
   setTimeout(() =>{
    document.location.reload();
   }, 100

   );
    }
  };
  
  xhttp.open("GET", "delete.php?id="+id+"", true);
  xhttp.send();


}

function btndelete(id){

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
   console.log(this.response);
       document.location.reload();

    }
  };
  
  
  xhttp.open("GET", "delete.php?id="+id+"", true);
  xhttp.send();


}


function getimg(id){

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      x =this.response.trim();
      console.log(x);
   document.getElementById('photoProfile').src = "../" + x;

    }
  };
  
  xhttp.open("GET", "GetTopicInfo.php?id=" + id+"&tag=image", true);
  xhttp.send();


}


function getimg1(id){

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      x =this.response.trim();
      console.log(x);
   document.getElementById('photoProfile').src = "../" + x;

    }
  };
  
  xhttp.open("GET", "GetTopicInfo1.php?id=" + id+"&tag=image", true);
  xhttp.send();


}
function showallmsg1(){
  document.querySelector('.SendMessageForm').style.display = 'none' ;

  document.getElementById('showallMessages').style.display = 'block' ;
  document.querySelector('.showallrecive').style.display = 'none' ;
  
  document.querySelector('.MessAgeFORMsHOX').style.display = 'none' ; 
  document.querySelector('.mymsg').style.display = 'none' ;
  document.querySelector('#searchMessages').style.display = 'none' ;
}

