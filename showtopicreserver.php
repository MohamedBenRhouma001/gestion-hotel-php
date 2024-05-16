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
  
  
  $sql123 = "SELECT * FROM `reservation` WHERE `idclient`= '".$_SESSION['id']."'  AND `etatRes`='0' AND `Price-M` = '0'  " ;
  $query123 = mysqli_query($connection ,$sql123) ;
  if(mysqli_num_rows($query123) > 0){
 
    $sql = "SELECT * FROM room " ;
    $query = mysqli_query($connection ,$sql) ;
    if(mysqli_num_rows($query) > 0){
      $i=0;
      echo '<div class="bd-reserv-all-tp-1" >
      <div class ="accept-valid-all-chose" data-aos="fade-in" onclick="Toupdate()" > <button class="check-all-chose">Reserver Tout</button></div>
      ';
        while($row = mysqli_fetch_array($query)){
     
          $sql12 = "SELECT * FROM `reservation` WHERE `idclient`= '".$_SESSION['id']."' AND `idroom` = '".$row['id']."' AND `etatRes`='0' AND `Price-M` = '0'  " ;
    $query12 = mysqli_query($connection ,$sql12) ;
    if(mysqli_num_rows($query12) > 0){
      $row12 = mysqli_fetch_array($query12);
      $i=$i+1;
        echo '
        <div class="topic-content-resev"   data-aos="fade-right">
        <div class="img-topic-resev" ><img src="'.GetFirstImage1($row['image']).'" ></div>
        <div class="bd-all-inf">
            <div class="head-topic-resev">
                <div class="title-topic-resev">'.$row['title'].'</div>
                <div class="rat-topic-resev">';
                showStar1 (stars1($connection ,$row['id']));
                echo '</div>
            </div> 
    
            <div class="bd-topic-resev">
            <div class="head-bd-topic-resev">
            <div class="max-per-topic-resev">maximum de personnes autorisées : <p id="maxnumber'.$i.'" class="maxnumber">'.$row['maxNbr'].'</p></div>
            <div class="price-topic-resev1" id="class="price-topic-resev1'.$i.'"><p class="pShow" id="pSchowF'.$i.'">'.$row['RoomPrice'].' DT</p><p class="pShow" id="pSchowD'.$i.'"></p></div>
            </div>     
                 <div class="inf-topic-resv">
                    <div class="per-topic-rsv">
                        <div class="form-topic-res ">
                            <div class="adult-topic-res1 souscontentform">
                                <div class="titre-ad-ch1"><p>Adulte(s)</p></div>
                                <div class="contente-ad-ch1">
                                     <button class="contente-ad-ch-bt1" onclick="alletnegad('.$row12['id'].','.$i.')">-</button>
                                     <input class="contente-ad-ch-inp1 contente-ad-ch-inp58" id="show_adultnum'.$i.'" type="text" name="nb" value="0" >
                                     <button class="contente-ad-ch-bt1" onclick="alletposad('.$row12['id'].','.$i.')">+</button>
                                </div>
                            </div>
                              <div class="child-topic-resev1 souscontentform">
                                 <div class="titre-ad-ch1"><p>Enfant(s</p></div>
                                 <div class="contente-ad-ch1">
                                    <button class="contente-ad-ch-bt1" onclick= "alletnegch('.$row12['id'].','.$i.')">-</button>
                                    <input class="contente-ad-ch-inp1 contente-ad-ch-inp58" id="show_childnum'.$i.'" type="text" name="nb" value="0" >
                                    <button class="contente-ad-ch-bt1" onclick ="alletposch('.$row12['id'].','.$i.')">+</button>
                                </div>   
                            </div>
                            <div class="nbr-topic-resev souscontentform">
                            <label for="all-rooms-nbr">Nbr Chambres:</label>
                            <select id="nbrRoom'.$i.'" class="select-berd1" onchange="up_inf_res_all('.$row12['id'].','.$i.')">
                                <option value="1"  selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        </div>
                    </div>
                </div>
                
            </div>  
            <div class="foot-topic-resev" >
                 <div class="delete-topic-resev" onclick="deleteResevation111('.$row12['id'].')">Supprimer</div>
                 <div class="check-topic-resev" onclick="Toupdate1('.$row12['id'].')" >Reserver</div>  
            </div> 
        </div> 
    </div> 

        ' ;
    
    
    }
           
       }
       echo '
       
       </div>';
    }
    
  




  }else{
      echo' <div class ="erreur-chose-top1"> There s no topics!!</div>';
    }
    
  
?>