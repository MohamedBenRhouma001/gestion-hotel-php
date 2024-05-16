function insertinfo(){
    var checkin = document.querySelector('#checkin').value ;
    var checkout = document.querySelector('#checkout').value ;
    var topicID = document.querySelector('#topicID').value ;
    var rooms = document.querySelector('.select-par-com-tp-in').value ;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         console.log(this.response) ;
        if (this.response == 1){


          window.location = "index.php" ;
        }

        

      }
    }
      xhttp.open("GET", "payment.php?id="+topicID+"&checkin="+checkin+"&checkout="+checkout+"&rooms="+rooms+"", true);
      xhttp.send();
}

function onlick1(){
  document.querySelector('.check-butt').style.display = "block" ;
  document.getElementById('m1m').style.display = "block" ;
  document.getElementById('m2m').style.display = "none" ;
  document.getElementById('m3m').style.display = "none" ;
}
function onlick2(){
  document.querySelector('.check-butt').style.display = "block" ;
  document.getElementById('m2m').style.display = "block" ;
  document.getElementById('m1m').style.display = "none" ;
  document.getElementById('m3m').style.display = "none" ;
}
function onlick3(){
  document.querySelector('.check-butt').style.display = "block" ;
  document.getElementById('m3m').style.display = "block" ;
  document.getElementById('m2m').style.display = "none" ;
  document.getElementById('m1m').style.display = "none" ;
}

function checkpromoCode(){
  var code = document.querySelector('#select-berd').value ;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log('code :'+code) ;
      console.log(this.response) ;
      if(this.response > 0){
        document.querySelector('.ShowPromo').style.display = "block" ;
        document.querySelector('.falsePromo').style.display = "none" ;
        document.querySelector('#putpromoh').innerHTML = this.response+"%" ;
        document.querySelector('.Discount-Percontage').value = this.response ;
      }else{
        document.querySelector('.ShowPromo').style.display = "none" ;
        document.querySelector('.falsePromo').style.display = "block" ;        
      }

    }
  }
    xhttp.open("GET", "promoCode.php?code="+code+"", true);
    xhttp.send();  
}
function HomeURL(){
  window.location.href = "index.php" ;
}

/*    ----------------------------------------------------------    */
function update_Payment() {
  var activity = document.querySelector('#activity').value ;
  console.log(activity);
  var Plats = document.querySelector('#Plats').value ;
  console.log(Plats);
  var bedTyp = document.querySelector('#bedTyp').value ;
  console.log(bedTyp);
  var checkin = document.querySelector('#checkin').value ;
  console.log(checkin);
  var checkout = document.querySelector('#checkout').value ;
  console.log(checkout);
  var discount = document.querySelector('#select-berd').value ;
  console.log(discount);
  console.log('-------------------------------------------------');
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var checkinDate = new Date(checkin);
      var checkoutDate = new Date(checkout);
      if (checkoutDate > checkinDate && checkinDate >= new Date()  && checkout !== "" && checkout !== "") {
      console.log(this.responseText);
      if (this.responseText.charAt(0) === 'i') {
        document.querySelector('.payment-worning ').style.display = "block" ;
        document.querySelector('.payment-worning ').innerHTML="<p>sorry that the room of this "+this.responseText+" is not available</p>";
      } else {
        console.log(this.responseText);
        window.location.href = "facture.php" ;
      }
      }else{window.alert("Please check the value at check-in and check-out.");}

    }}
    xhttp.open("GET", "paid_all_update.php?checkin="+checkin+"&checkout="+checkout+"&discount="+discount+"&activity="+activity+"&bedTyp="+bedTyp+"&Plats="+Plats+"", true);
    xhttp.send();  
}


function update_Payment1(id) {
  var activity = document.querySelector('#activity').value ;
  console.log(activity);
  var Plats = document.querySelector('#Plats').value ;
  console.log(Plats);
  var bedTyp = document.querySelector('#bedTyp').value ;
  console.log(bedTyp);
  var checkin = document.querySelector('#checkin').value ;
  console.log(checkin);
  var checkout = document.querySelector('#checkout').value ;
  console.log(checkout);
  var discount = document.querySelector('#select-berd').value ;
  console.log(discount);
  console.log('-------------------------------------------------');
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var checkinDate = new Date(checkin);
      var checkoutDate = new Date(checkout);
      if (checkoutDate > checkinDate && checkinDate >= new Date()) {
      console.log(this.responseText);
      if (this.responseText.charAt(0) === 'i') {
        document.querySelector('.payment-worning ').style.display = "block" ;
        document.querySelector('.payment-worning ').innerHTML="<p>sorry that the room of this "+this.responseText+" is not available</p>";
        window.alert("sorry that the room of this "+this.responseText+" is not available");
      } else {
        console.log(this.responseText);
       window.location.href = "facture.php" ;
      
      }
      }else{window.alert("Please check the value at check-in and check-out.");}

    }}
    xhttp.open("GET", "paid_all_update1.php?id="+id+"&checkin="+checkin+"&checkout="+checkout+"&discount="+discount+"&activity="+activity+"&bedTyp="+bedTyp+"&Plats="+Plats+"", true);
    xhttp.send();  
}



function outpay() {
        window.location.href = "../index.php" ;

}

function insertinfo1(){

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {  
      console.log(this.responseText);

      if (this.responseText.charAt(0) === 'i') {
        window.alert("sorry that the room of this "+this.responseText+" is not available , Please change the date or room number.");
      } else {
        console.log(this.responseText);
        window.location.href = "../index.php" ; 
      }

    }
  }
    xhttp.open("GET", "../confpayment.php", true);
    xhttp.send();
}


function insertinfo(id){
  
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {  
    
   console.log(this.response) ; 
    if (this.response==1){
       window.location.href = "../index.php" ; 
      }else{
        window.alert("sorry that the room of this id :"+id+" is not available , Please change the date or room number.");
      }
    }
  }
    xhttp.open("GET", "../confpayment2.php?id="+id+"", true);
    xhttp.send();
}

function showboxverif(stape1){
  console.log(stape1);
  document.querySelector('.content-ver').style.display = "none" ;
  document.querySelector('.content-chang').style.display = "block" ;

}
function returnboxverif(){
  document.querySelector('.content-ver').style.display = "block" ;
  document.querySelector('.content-chang').style.display = "none" ;

}

