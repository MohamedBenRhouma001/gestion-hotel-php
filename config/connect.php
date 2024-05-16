<?php
session_start();

$host = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "gestion_hotel"; 

// Create a connection to the database
$connection = new mysqli($host, $user, $password, $database);

// Check for connection errors
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}

function GetFirstImage($link){
  $length = strlen($link) ;
  $result = '' ;
  for($i = 1 ; $i < $length ; $i++){
      $charnow = $link[$i] ;
      if($charnow !== '+'){
          $result = $result.''.$charnow ;
      }
      else{
          return $result ;
          exit ;
      }

  }

}
 

function showStar ($x){

  if ($x == 1) {
    echo '
      <img src="images/sta2r.png" />
      <img src="images/star.png" />
      <img src="images/star.png" />
      <img src="images/star.png" />
      <img src="images/star.png" />
    ';
  } elseif ($x == 2) {
    echo '
      <img src="images/sta2r.png" />
      <img src="images/sta2r.png" />
      <img src="images/star.png" />
      <img src="images/star.png" />
      <img src="images/star.png" />
    ';
  }elseif ($x == 0) {
    echo '
      <img src="images/star.png" />
      <img src="images/star.png" />
      <img src="images/star.png" />
      <img src="images/star.png" />
      <img src="images/star.png" />
    ';
  }elseif ($x == 3) {
    echo '
      <img src="images/sta2r.png" />
      <img src="images/sta2r.png" />
      <img src="images/sta2r.png" />
      <img src="images/star.png" />
      <img src="images/star.png" />
    ';
  } elseif ($x == 4) {
    echo '
      <img src="images/sta2r.png" />
      <img src="images/sta2r.png" />
      <img src="images/sta2r.png" />
      <img src="images/sta2r.png" />
      <img src="images/star.png" />
    ';
  } elseif ($x == 5) {
    echo '
      <img src="images/sta2r.png" />
      <img src="images/sta2r.png" />
      <img src="images/sta2r.png" />
      <img src="images/sta2r.png" />
      <img src="images/sta2r.png" />
    ';
  }
  
         
} 

function stars($con ,$roomid){
       $sql = "SELECT * FROM  stars WHERE idtopic = '".$roomid."'" ;
       $query = mysqli_query($con ,$sql) or die('rror') ;
       $number_topics = mysqli_num_rows($query) ;
       if( $number_topics > 0){
        $count_all_stars =0 ;
           while($row = mysqli_fetch_array($query)){
            $count_all_stars = $count_all_stars + $row['stars'] ;
           }

           $result = intdiv($count_all_stars, $number_topics); 
return $result ;
       }
}



function showAllTopics($connection) {
  $sql = "SELECT * FROM room " ;
  $query = mysqli_query($connection ,$sql) ;
  if(mysqli_num_rows($query) > 0){
      while($row = mysqli_fetch_array($query)){
      
        echo '
        
         <div class="topicHolder" data-aos="fade-in">
         <div class="Topictitle">'.$row['title'].'</div>
         <div class="rating" id="rat12">';
         
         showStar (stars($connection ,$row['id']));

         echo'</div>
         <div class="cadre-topic" onclick="topicURL('.$row['id'] .')">
           <div style="background-image: url('.GetFirstImage($row['image']).');" class="TopicImgHolder">
           </div>
         </div>
         <div class="info-tp">
          <div class="prix-tp">'.$row['RoomPrice'].' DT</div>
          <div class="bt-panie-tp" onclick ="addCart('.$row['id'] .' , '.$_SESSION['id'].')">Ajouter au Panier</div>
         </div>


  </div>' 
         ;}
  }
  else{
    echo" There's no topics!!";
  }
}



function getuserinformation($con ,$id ,$table) {
 $sql = "SELECT * FROM client WHERE id = '".$id."'" ;
 $query = mysqli_query($con ,$sql) ;
 if(mysqli_mun_rows($query) > 0){
     $row = mysqli_fetch_row($query) ;
     $q = $row[$table] ;
    
 }else{
     $q = 'there is no topics' ;
 }
 return $q ;

}

function updateuserinformation($con ,$id ,$table ,$value){

}

function codePromo(){
  
}

?>