function add_person(i) {
  var maxperson = Number(document.querySelector('#maxnumber' + i).textContent);
  var personRNOX = document.querySelector('#show_adultnum' + i);
  var personRNOXchil = document.querySelector('#show_childnum' + i).value;

  if ((Number(personRNOX.value) + Number(personRNOXchil)) == maxperson) {

  } else {
      personRNOX.value++;
  }
}



function removeone(i){
  var personRNOX =document.querySelector('#show_adultnum'+i);
     
    if(personRNOX.value == 0){}
    else{
      personRNOX.value-- ;
    }
}



function remove(i){  
  var personRNOX =document.querySelector('#show_childnum'+i);
     
    if(personRNOX.value == 0){}
    else{
      personRNOX.value-- ;
    }
}

function addChild(i){
  var maxperson = Number(document.querySelector('#maxnumber' + i).textContent);
  var personRNOX = document.querySelector('#show_childnum' + i);
  var personRNOXadult =document.querySelector('#show_adultnum'+i).value;

  if ((Number(personRNOX.value) + Number(personRNOXadult)) == maxperson) {

  } else {
      personRNOX.value++;
  }
    
}
  

function up_inf_res_all(id, i) {
    var nbrRoom = document.getElementById("nbrRoom" + i).value;
    var adul = document.getElementById("show_adultnum" + i).value;
    var child = document.getElementById("show_childnum" + i).value;
  
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {

        var total = parseInt(this.response) * parseInt(nbrRoom);

        console.log(total);
      
 document.getElementById("pSchowF" + i).style.display ="none";
 document.getElementById("pSchowD" + i).innerHTML =total + " DT";
      }
    }
    xhttp.open("GET", "up_inf_res_all.php?id=" + id + "&adult=" + adul + "&child=" + child + "&nbrRoom=" + nbrRoom+"", true);
    xhttp.send();
    
  }

  function alletnegad(id ,i){
    removeone(i);
    up_inf_res_all(id, i);
  }

  function alletposad(id ,i){
    add_person(i);
    up_inf_res_all(id, i);
}
  function alletnegch(id ,i){
    remove(i);
    up_inf_res_all(id, i);
}
  function alletposch(id ,i){
    addChild(i);
    up_inf_res_all(id, i);
}