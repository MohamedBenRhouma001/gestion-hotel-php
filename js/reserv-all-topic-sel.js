function showtopicreserver(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         document.querySelector('.reserv-all-tp-1').innerHTML = this.response ;
      }
    }
      xhttp.open("GET", "showtopicreserver.php", true);
      xhttp.send();
    
    }

    function backhome(){
        window.location = "index.php";
    }

    function paynaw(){
      window.location = "checkallres/index.php";
  }

  
    function deleteResevation111(id){
      var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    showtopicreserver();
   
    }
      xhttp.open("GET", "deleteReserv.php?id="+id+"", true);
      xhttp.send();
    }
   
    function showFacture( ){
      var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
     document.querySelector('.bd-js-php').innerHTML = this.response ;
      }
    }
      xhttp.open("GET", "showFacture.php", true);
      xhttp.send();
    }
// Fonction pour gérer le clic sur le bouton
function imprimerPage() {
  window.print(); // Déclenche l'impression de la page
}
   
function sel(){
    document.querySelector('.slect_cont_panier').style.display="block";
    document.querySelector('.select-p').style.zIndex = '2';
    document.querySelector('.reserve_cont_panier').style.display="none";
    document.querySelector('.reserve-p').style.zIndex = '0';
    document.querySelector('.select-p').style.boxShadow = ' 6px -5px 7px -4px rgb(159, 144, 144)';
    document.querySelector('.reserve-p').style.boxShadow = '6px -5px 7px -4px rgb(159, 144, 144)';
}
function res(){
  document.querySelector('.select-p').style.zIndex = '0';
  document.querySelector('.slect_cont_panier').style.display="none";
  document.querySelector('.reserve-p').style.zIndex = '2';
    document.querySelector('.reserve_cont_panier').style.display="block";
    document.querySelector('.select-p').style.boxShadow = '-6px -5px 7px -4px rgb(159, 144, 144)';
    document.querySelector('.reserve-p').style.boxShadow = '-6px -5px 7px -4px rgb(159, 144, 144)';
}

function getresertopics(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       document.querySelector('#cont_item_res').innerHTML = this.response ;
    }
  }
    xhttp.open("GET", "reserve.php?mode=check", true);
    xhttp.send();
  }


  function verifetatpar(i) {
    var dropdownToggle = document.querySelector('.dropdown-menu'+i+'');
    var display = dropdownToggle.style.display;
    dropdownToggle.style.display = (display === 'block') ? 'none' : 'block';
  }
  
  function getselectopics(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {

         document.querySelector('#cont-item-select').innerHTML = this.response ;

      }
    }
      xhttp.open("GET", "selet.php?mode=check", true);
      xhttp.send();
    }

    function deleteResevation(id ,type){
      var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.response);
      getselectopics();
      getresertopics();
      if (this.response == 0) {
        document.querySelector('.reserv-all-top').style.display="none";      
      }else if(this.response == 2){
        document.querySelector('.select-all-top').style.display="none";  
      }
      }
    }
      xhttp.open("GET", "deleteReserv.php?id="+id+"&type="+type+"", true);
      xhttp.send();
    }

    function return1(id){
console.log(id);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            console.log(this.response);
            if (this.response==1){
    
            window.location = "All-reservation.php";
    }
  }
  }
    xhttp.open("GET", "return.php?id="+id+"", true);
    xhttp.send();
  }
