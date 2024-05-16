let Posts = [
    [
        "Best rooms we have with best prices !" ,
        "Example mohamed ali ousama terma" ,
        "url('images/back-header.jpg')"
    ],
    [
        "Gasma beelah libya zabieee" ,
        "this example text for the project" ,
        "url('images/1.jpg')"
    ]
];
if (document.querySelector('.PostTileSilde') !== null) {
document.querySelector('.PostTileSilde').innerHTML = Posts[0][0] ;
document.querySelector('.PostDescSidde').innerHTML = Posts[0][1] ;
document.querySelector('.slidShoz').style.backgroundImage = Posts[0][2] ;
let PostNum = Posts.length -1;
let i = 0 ;}
function nextSlidePost(){
       i++;
      
      if(i > PostNum){
        document.querySelector('.Nextbutton').disabled = true;
      }else{
        document.querySelector('.PostTileSilde').innerHTML = Posts[i][0] ;
        document.querySelector('.PostDescSidde').innerHTML = Posts[i][1] ;
        document.querySelector('.slidShoz').style.backgroundImage = Posts[i][2] ;

      }
}
function perSlidePOSE(){
  i--
    if(0 > i){
        document.querySelector('.prebutton').disabled = true;
      }else{
        document.querySelector('.PostTileSilde').innerHTML = Posts[i][0] ;
        document.querySelector('.PostDescSidde').innerHTML = Posts[i][1] ;
        document.querySelector('.slidShoz').style.backgroundImage = Posts[i][2] ;

      }
}
function achat(){
  document.getElementById('showres').style.display = "none" ;
  document.getElementById('showach').style.display = "block" ;
  document.getElementById('showsel').style.display = "none" ;
}
function select(){
  document.getElementById('showres').style.display = "none" ;
  document.getElementById('showach').style.display = "none" ;
  document.getElementById('showsel').style.display = "block" ;
}
function reserve(){
  document.getElementById('showres').style.display = "block" ;
  document.getElementById('showach').style.display = "none" ;
  document.getElementById('showsel').style.display = "none" ;
}
function showbox(){
  var dropdownToggle = document.querySelector('.body');
  var display = dropdownToggle.style.display;
  dropdownToggle.style.display = (display === 'block') ? 'none' : 'block';
  closeb();
}
function showb(){
  var dropdownToggle = document.querySelector('.body-profile');
  var display = dropdownToggle.style.display;
  dropdownToggle.style.display = (display === 'block') ? 'none' : 'block';
  closebox();
}
function closebox(){
  document.querySelector('.body').style.display = "none" ;
}

function closeb(){
  document.querySelector('.body-profile').style.display = "none" ;
}

function SelectUserInfo(table ,value){
  
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
         var result = this.response ;
         console.log(value) ;
           switch (table){
              case 'nom' :
                 document.querySelector('#username1').value = result ;
              break ;
              case 'mail' :
                 document.querySelector('#email').value = result ;
              break ;    
              case 'photo' :
                 document.querySelector('#image1').value = result ;
              break ;                          
           }
    }
  }
    xhttp.open("GET", "updateinfo.php?mode=userinf&table="+table+"&value="+value+"", true);
    xhttp.send();
}


function mainUpdateUser(id) {
       /* username */
       SelectUserInfo('nom' ,id) ;
       /* username */
       SelectUserInfo('mail' ,id) ;
       /* username */
       SelectUserInfo('photo' ,id) ;              
}





function updateUserIN(table ,values ,id){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.response);
if (this.response == 10){
  window.alert('Desole, l e-mail existe deja !') ;
}else{
      mainUpdateUser(id) ;
      document.querySelector('#password1').value="";
      document.querySelector('#passconf1').value="";
      document.querySelector('.body-profile').style.display="none";
  }
    }
}
xhttp.open("GET", "updateinfo.php?mode=updateinf&table="+table+"&id="+id+"&value="+values+"", true);
xhttp.send();
}

function updateUserInfo(id) {

     var username = document.querySelector('#username1').value ;
     var photo = document.querySelector('#image1').value ;
     var password = document.querySelector('#password1').value;
     var passConf = document.querySelector('#passconf1').value;
     var email = document.querySelector('#email').value;

var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

if (!passwordPattern.test(password) || !passwordPattern.test(passConf) || !emailPattern.test(email)) {
  window.alert('Le mot de passe doit contenir au moins 8 caractères, dont au moins un chiffre, une lettre majuscule et une lettre minuscule. Veuillez entrer une adresse e-mail valide.');
}else if(password == passConf){
      updateUserIN("nom" ,username ,id);
      updateUserIN("photo" ,photo ,id) ;
      updateUserIN("mail" ,email ,id) ;
      updateUserIN("password" ,password ,id);
     }else{
      window.alert('Le confirm mot de passe n est pas le meme !') ;
     }
     checkinfo(id) ;


}

function SelectUserInfo2(table ,value){
  
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
         var result = this.response ;
           switch (table){
              case 'nom' :
                 document.querySelector('.headerusername').innerHTML= result ;
              break ;   
              case 'photo' :
                 document.querySelector('#accountbgimg').src = result ;
              break ;                          
           }
    }
  }
    xhttp.open("GET", "updateinfo.php?mode=userinf&table="+table+"&value="+value+"", true);
    xhttp.send();
}

function checkinfo(id){

   SelectUserInfo2('nom' ,id) ;
   SelectUserInfo2('photo' ,id) ;
}

function topicURL(id){
  window.location.href = "index.php?index=topic&ID="+id+"" ;
}


function getachattopics(user){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      
       document.querySelector('.topicsach').innerHTML = this.response ;
    }
  }
    xhttp.open("GET", "achat.php?mode=check&id="+user+"", true);
    xhttp.send();
  }


var opac = anime({
  targets: ".letter",
  opacity: 1,
  scale: 1,
  easing: "easeInBounce",
  delay: function (el, index) {
    return index * 100;
  },
  direction: "alternate",
  loop: true
});

function register(){
  window.location = "signup.php";
}

function checkinResevation(id){
  var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    console.log('cc : '+ this.response + ' room : '+id)
    if(this.response == 0){ 
    window.alert('All room has been rented .try again when there is room avilable')  ;
   } else{
    getresertopics(this.response) ;
    getachattopics(this.response) ;
    }


}
}
  xhttp.open("GET", "checkpaiment.php?id="+id+"&etat=1", true);
  xhttp.send();
}
function addCart(id , user){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if(this.response==1){
        console.log(this.response);
        
        showtopics();

      }else if (this.response==2){
        console.log(this.response);
        window.alert('Connectez-vous s il vous plaît  .'); 
      } else if (this.response==0){
        console.log(this.response);
        window.alert('Attention! deja réserve .'); 
      }
  
  }
  }
    xhttp.open("GET", "addCart.php?id="+id+"", true);
    xhttp.send();

}

function checkintopselect(id){
  var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    console.log('cc : '+ this.response + ' room : '+id)
    if(this.response == 0){ 
    window.alert('All room has been rented .try again when there is room avilable')  ;
   } else{
    getselectopics(this.response);
    }


}
}
  xhttp.open("GET", "checkselecttopic.php?id="+id+"&etat=1", true);
  xhttp.send();
} 

  function sessiondestroy(){
    window.location.href = "sessiondestroy.php" ;
}


function Toupdate(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       if (this.response==1){
        window.location.href = "paid_all.php" ;
       }
    }
  }
    xhttp.open("GET", "alltopicselet.php", true);
    xhttp.send();
  }

  function Toupdate1(id){
   
          window.location.href = "paid_all.php?id="+id+"" ;
        
    }



  function gopay(id){
    
    window.location.href = "checkallres/index.php?id="+id+"" ;
        
  }

  function showtopics(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         document.querySelector('.topicsP').innerHTML = this.response ;
      }
    }
      xhttp.open("GET", "showtopics.php", true);
      xhttp.send();
    
    }
  
    
    
    function gopay(id,price){
      
      window.location.href = "checkallres/index.php?id="+id+"&price="+price+"" ;
          
    }
  
    function allReservation(){
      window.location = "All-reservation.php";
  }



  