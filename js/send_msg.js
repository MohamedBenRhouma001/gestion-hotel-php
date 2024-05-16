$(document).ready(function() {
    $("#sendmsg").click(function() { 
        var title = $("#msgtitle").val(); 
        var content = $("#Msgcontent").val();
        
        $.ajax({
            url: "sendmsg.php", 
            type: "POST", 
            data: { title: title, content: content}, 
            success: function(response) { 
                console.log(response) ;
                if(response == 1){
                document.querySelector('#msgsendsucc').style.display = "block" ;
                document.querySelector('#msgsenderror').style.display = "none" ;
                document.querySelector("#msgtitle").value=""; 
                document.querySelector("#Msgcontent").value="";

                setTimeout(function() {
                  window.location = "index.php";
                }, 300);

                }
                else{
                    document.querySelector('#msgsendsucc').style.display = "none" ;
                    document.querySelector('#msgsenderror').style.display = "block" ;
                }
            },
            error: function(jqXHR, textStatus, errorThrown) { // the callback function to execute if the request fails
                console.log(textStatus + ": " + errorThrown); // log the error message to the console
            }
        });
    });
});

function backhome(){
    window.location = "../index.php";
  }
  function SelectUserInfo(table ,value){
  
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
           var result = this.response ;
           console.log('active');
             switch (table){
                case 'nom' :
                   document.querySelector('.nameUser').innerHTML= result ;
                break ;   
                case 'photo' :
                    result='../'+result;
                    console.log(result);
                   document.querySelector('#userimg').src = result ;
                break ;                          
             }
      }
    }
      xhttp.open("GET", "../updateinfo.php?mode=userinf&table="+table+"&value="+value+"", true);
      xhttp.send();
  }
  
  function checkinfo(id){
    
     SelectUserInfo('nom' ,id) ;
     SelectUserInfo('photo' ,id) ;
  }
  

  function searchmsg() {
    var titre = document.querySelector('#search').value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4) {
        if (this.status == 200) {
          document.querySelector('.SendMessageForm').style.display = 'none' ;
          document.getElementById('showallMessages').style.display = 'none' ;
          document.querySelector('.showallrecive').style.display = 'none' ; 
          document.querySelector('.MessAgeFORMsHOX').style.display = 'none' ; 
          document.querySelector('.mymsg').style.display = 'none' ;
          document.querySelector('#searchMessages').style.display = 'block' ;
          document.getElementById('searchMessages').innerHTML = this.response;
        } else {
          console.log('Error: ' + this.status);
        }
      }
    };
    xhttp.open('GET', 'searchmsg.php?titre=' + titre, true);
    xhttp.send();
  }
  