function checkreservation (idtopic){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log("resulta : "+this.response)
          if(this.response == 1 ){
                 document.querySelector('.switchmode').style.display = "none" ;
                 document.querySelector('.checkifreseerd').style.display = "block" ;
          }

      }
    }
      xhttp.open("GET", "updateinfo.php?mode=reservation&id="+idtopic+"", true);
      xhttp.send();
}
function showDescrh(){
    document.querySelector('.reserv-tp').style.display = "block" ;
    document.querySelector('.switchmode').style.display = "none" ;
    document.querySelector('.rating').style.display = "none" ;
    document.querySelector('.title-tp').style.display = "none" ;
    document.querySelector('.image-topic').style.display = "none" ;
    document.querySelector('.desc-topic').style.display = "none" ;

}
function showpayment(){ 
    var bed_type = document.querySelector('#bedTyp10').value ;
    var PromoEtat = document.querySelector('#select-berd').value ;
    var adult = document.querySelector('#show_adultnum').value ;
    var child = document.querySelector('#show_child10').value ;
    var checkin = document.querySelector('#checkin').value ;
    var checkout = document.querySelector('#checkout10').value ;
    var topicID = document.querySelector('#topicID').value ;
    var rooms = document.querySelector('#roomsnbr').value ;
    var Plats = document.querySelector('#Plats10').value ;
    var activity = document.querySelector('#activity10').value ;
   
    var currentDate = new Date();
    var checkinDate = new Date(checkin);
      var checkoutDate = new Date(checkout);

    if( checkinDate >= currentDate  && checkout !== "" && checkout !== "" && checkoutDate > checkinDate){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.response) ;
        if (this.response==1){
      
          console.log(this.response);
         window.location.href = "facture.php?id="+topicID+"" ;
}else{
  document.querySelector('#worningtopicdate').style.display = "block" ;
}
      }
    }
      xhttp.open("GET", "checkin.php?id="+topicID+"&child="+child+"&adult="+adult+"&checkin="+checkin+"&checkout="+checkout+"&rooms="+rooms+"&activity="+activity+"&Plats="+Plats+"&PromoEtat="+PromoEtat+"&bedtype="+bed_type+"", true);
      xhttp.send();
      
      
    }else{
      window.alert('Choose the check-in and check-out values correctly') ;
    }
}

function goLogin(){
    document.querySelector('#goLog').style.display = "block" ;
}
/*
function getnumberRoom(id){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log('code : '+this.response)
      var html = this.response ;
      document.getElementById('NumROOMs').innerHTML = this.response ;

    }
  }
    xhttp.open("GET", "getNumberRooms.php?id="+id+"", true);
    xhttp.send();     
}*/

function getnumberRooms(id){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log('code : '+this.response) ;
      if(this.response == 0){
        document.querySelector('.checkifrooms').style.display = 'block' ;
        document.querySelector('.switchmode').style.display = 'none' ;
      }
      }

    }
  
    xhttp.open("GET", "checkRooms.php?id="+id+"", true);
    xhttp.send();     
}



function star(x){
  console.log('value x : '+x)
  if(x > 0){ 
    document.querySelector('#star1').src = 'images/sta2r.png'
  }
  if(x > 1){
    document.querySelector('#star2').src = 'images/sta2r.png'
  }

  if(x > 2){
    document.querySelector('#star3').src = 'images/sta2r.png'
  }

  if(x > 3){
    document.querySelector('#star4').src = 'images/sta2r.png'
  }
  if(x > 4){
    document.querySelector('#star5').src = 'images/sta2r.png'
  }
}


function unstar(){
  document.querySelector('#star1').src = 'images/star.png'
  document.querySelector('#star2').src = 'images/star.png'
  document.querySelector('#star3').src = 'images/star.png'
  document.querySelector('#star4').src = 'images/star.png'
  document.querySelector('#star5').src = 'images/star.png'

}
function unstar2(){
  document.querySelector('#stars1').src = 'images/star.png'
  document.querySelector('#stars2').src = 'images/star.png'
  document.querySelector('#stars3').src = 'images/star.png'
  document.querySelector('#stars4').src = 'images/star.png'
  document.querySelector('#stars5').src = 'images/star.png'

}

function savestar(x ,id){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log('etat : '+this.response) ;
        


      }
    }

    xhttp.open("GET", "checkstar.php?id="+id+"&stars="+x+"", true);
    xhttp.send();     
}

function bringStars(idtopic){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log('vv : '+this.response) ;
      var x = this.response ;

      if(x > 0){ 
        document.querySelector('#stars1').src = 'images/sta2r.png'
      }
      if(x > 1){
        document.querySelector('#stars2').src = 'images/sta2r.png'
      }
    
      if(x > 2){
        document.querySelector('#stars3').src = 'images/sta2r.png'
      }
    
      if(x > 3){
        document.querySelector('#stars4').src = 'images/sta2r.png'
      }
      if(x > 4){
        document.querySelector('#stars5').src = 'images/sta2r.png'
      }   
console.log('x : ' +x)
      }
    }

    xhttp.open("GET", "checkstar.php?mode=insert&id="+idtopic+"", true);
    xhttp.send(); 
}

function switchstars(id) {


  document.querySelector('#form1s').style.display =  'block' ;
  document.querySelector('#form2s').style.display =  'none' ;
  unstar2() ;
  bringStars(id) ;
}
function reversstars(id){

  document.querySelector('#form1s').style.display =  'none' ;
  document.querySelector('#form2s').style.display =  'block' ;

  unstar2();
  bringStars(id) ;
}
function home3(){
  window.location = "index.php";
}