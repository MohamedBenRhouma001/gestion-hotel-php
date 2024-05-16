<?php 
require_once('config/connect.php') ;

function GetFirstImage1($link){
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
   
  
  function showStar1 ($x){
  
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
  
  function stars1($con ,$roomid){
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
  
  
  
 
    $sql = "SELECT * FROM room " ;
    $query = mysqli_query($connection ,$sql) ;
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_array($query)){
     
          $sql12 = "SELECT * FROM `reservation` WHERE `idclient`= '".$_SESSION['id']."' AND `idroom` = '".$row['id']."' AND `etatRes`='0' AND `Price-M` = '0'  " ;
    $query12 = mysqli_query($connection ,$sql12) ;
    if(mysqli_num_rows($query12) > 0){
      echo '
          
      <div class="topicHolder" data-aos="fade-in">
      <div class="Topictitle">'.$row['title'].'</div>
      <div class="rating" id="rat12">';
      
      showStar1 (stars1($connection ,$row['id']));
  
      echo'</div>
      <div class="cadre-topic" onclick="topicURL('.$row['id'] .')">
        <div style="background-image: url('.GetFirstImage1($row['image']).');" class="TopicImgHolder">
        </div>
      </div>
      <div class="info-tp">
       <div class="prix-tp">'.$row['RoomPrice'].' DT</div>
       <div class="bt-panie-tp-accept" onclick ="addCart('.$row['id'] .' , '.$_SESSION['id'].')">Ajouter au Panier</div>
      </div>
  
  
  </div>' ;
    
    }else{
          echo '
          
           <div class="topicHolder" data-aos="fade-in">
           <div class="Topictitle">'.$row['title'].'</div>
           <div class="rating" id="rat12">';
           
           showStar1 (stars1($connection ,$row['id']));
  
           echo'</div>
           <div class="cadre-topic" onclick="topicURL('.$row['id'] .')">
             <div style="background-image: url('.GetFirstImage1($row['image']).');" class="TopicImgHolder">
             </div>
           </div>
           <div class="info-tp">
            <div class="prix-tp">'.$row['RoomPrice'].' DT</div>
            <div class="bt-panie-tp" onclick ="addCart('.$row['id'] .' , '.$_SESSION['id'].')">Ajouter au Panier</div>
           </div>
  
  
    </div>' 
           ;}
           
       }
    }
    else{
      echo" There's no topics!!";
    }
  
  
?>