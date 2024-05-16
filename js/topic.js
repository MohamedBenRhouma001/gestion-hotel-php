var maxperson = document.querySelector('#maxnumber').value ;
var personRNOX = 0 ;
var adult = 0 ;
var child = 0 ;
function add_person(){
   if(personRNOX == maxperson){

   }else {
    adult++ ;
    personRNOX++ ;
   }
   document.querySelector('#show_adultnum').value = adult ;
}

function add_nuit(){
    
    nbr = document.querySelector('#checkout').value ;
    nbr++ ;
   
    document.querySelector('#checkout').value = nbr ;
 }
function removenuit(){  
   
    nbr= document.querySelector('#checkout').value ;
    if (nbr > 0){
    nbr-- ;
   
    document.querySelector('#checkout').value =nbr ;
}
}


function removeone(){  
    if(adult == 0){}
    else{
        adult-- ;
        personRNOX-- ;
    }
    document.querySelector('#show_adultnum').value = adult ;
}



function remove(){  
    if(child == 0){}
    else{
        child-- ;
        personRNOX-- ;
    }
    document.querySelector('#show_child10').value = child ;
}

function addChild(){
    if(personRNOX == maxperson){

    }else {
     child++ ;
     personRNOX++ ;
    }
    document.querySelector('#show_child10').value = child ;
    
}
  