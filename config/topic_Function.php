<?php
function topic_Header($sitename) {
    echo'<div class="TopicHeadder">
    <div class="tpHeader">
        <div class="backTOmain">
           <button onclick="HomeURL()">Accueil</button>
        </div>
        <div class="titlePage" >
        <div class="titlename">
            <div class="titleletter" id="t1" style="color:#87815e;">B</div>
            <div class="titleletter" >e</div>
            <div class="titleletter" >r</div>
            <div class="titleletter" >g</div>
            <div class="titleletter" >e</div>
            <div class="titleletter" >s</div>
            <div class="titleletter espace" >.</div>
            <div class="titleletter" >d</div>
            <div class="titleletter" >u</div>
            <div class="titleletter espace" >.</div>
            <div class="titleletter">l</div>
            <div class="titleletter" >a</div>
            <div class="titleletter" >c</div>
          </div>
          <link href="https://fonts.googleapis.com/css?family=Unica+One" rel="stylesheet">
          
        </div> 
    </div>
</div>' ;
}

function makemist($words) {
    $length = strlen($words) ;
    $list = '' ;
    $form ='' ;
    for($i= 1 ; $i < $length ; $i++){
        $wordnow = $words[$i] ;
        if($wordnow !== '+'){
            $list = $list.''.$wordnow ;
        }
        else{
            $form = $form.''.'<li>'.$list.'</li>' ;
            $list = '' ;
        }
    }
    return $form ;
}


function GetTopic($con ,$id){
    $sql = "SELECT * FROM ROOM WHERE id = $id " ;
    $query = mysqli_query($con ,$sql) ;
    if(mysqli_num_rows($query) > 0){
        $fetch = mysqli_fetch_array($query) ;
        $title = $fetch['title'] ;
        $FirstImage = GetFirstImage($fetch['image']);
        $desc = $fetch['def'];
        $tags = $fetch['carract'] ;
        $maxnumber = $fetch['maxNbr'] ;
        $prix = $fetch['RoomPrice'] ;

        echo '
      
        <div class="topicinfo">

        <div class="topic-title">
            <input type="number" value="'.$_GET['ID'].'" id="topicID" />
            <div class="title-tp">'.$title.'</div>
            <div class="rating"  onmouseover="switchstars('.$_GET['ID'].')" onmouseout="reversstars('.$_GET['ID'].')">
            <div id="form1s" class="content-img">

            <img id="star1"  onmouseover="star(1)" onclick = "savestar(1 ,'.$_GET['ID'].')" onmouseout="unstar(1)" src="images/star.png"/>
            <img id="star2"  onmouseover="star(2)" onclick = "savestar(2 ,'.$_GET['ID'].')" onmouseout="unstar(2)"  src="images/star.png"/>
            <img id="star3"  onmouseover="star(3)" onclick = "savestar(3 ,'.$_GET['ID'].')" onmouseout="unstar(3)"  src="images/star.png"/>
            <img id="star4"  onmouseover="star(4)" onclick = "savestar(4 ,'.$_GET['ID'].')" onmouseout="unstar(4)"  src="images/star.png"/>
            <img id="star5"  onmouseover="star(5)" onclick = "savestar(5 ,'.$_GET['ID'].')" onmouseout="unstar(5)"  src="images/star.png"/>
            
            </div>
            <div id="form2s" class="content-img">

            <img id="stars1"   src="images/star.png"/>
            <img id="stars2"    src="images/star.png"/>
            <img id="stars3"   src="images/star.png"/>
            <img id="stars4"   src="images/star.png"/>
            <img id="stars5"   src="images/star.png"/>
            
            </div>            
            
            
            
            
            
            
            </div>
         </div>
        <div class="image-topic">
        <img id="image-topic" src = "'.$FirstImage.'">
        <div class="prix">'.$prix.' DT</div>
            <div class="image-tp">
                <div class="button-tp z-ind-bt-im-top" ><button onclick="Prevousimage()">Precedent</button></div>
                <div class="button-tp z-ind-bt-im-top"><button onclick="nextimage()">Suivante</button></div>

            </div>


        </div>
'; ?>
        <script>
            var etat = 1 ;
            function nextimage(){
                console.log("etat = "+ etat) ;
                const input = "<?php echo $fetch['image'] ?>";
                const names = input.slice(1).split("+");    
                var length = names.length ;
                if(etat < length){
                console.log(names[etat])
                document.querySelector("#image-topic").src = names[etat];
                etat += 1 ; 
                
            }
            }


            function Prevousimage(){
                
                console.log("etat = "+ etat) ;
                const input = "<?php echo $fetch['image'] ?>";
                const names = input.slice(1).split("+");    
                var length = names.length ;
                if(etat > 0){
                etat -= 1 ; 
                console.log(names[etat])
                document.querySelector("#image-topic").src = names[etat];
 
            }
            }           
        </script>  
 <?php
                echo'          





        <div class="desc-topic" >

            <div class="desc-tp">
                <p>'.$desc.'</p>

                <ul>'.makemist($tags).'</ul>




                </div>
            <div class="plan-img-tp"> 
                <img src="images/plan-room.jpeg">
            </div>

    </div>
';
if(!isset($_SESSION['id'])){
    echo'
    <div class="gologin">
    <button class="b-login" onclick="goLogin()">Reserver</button>
    </div>
    <div class="gogi">
    <p id="goLog">Vous ne pouvez pas, veuillez vous connecter </p></div>
    ';
}
if(isset($_SESSION['id'])){
echo'
<div class="checkifrooms">
<div class="alert alert-warning">
<strong>Non Chambre!</strong> Toutes les chambres sont louées de ce type. Essayez plus tard .
</div>
</div> 

    <div class="reserv-tp">

        <div class="room-resv-tp">Chambre #1</div>
        <div class="h_Person">maximum de personnes autorisées : <input type="text" readonly id="maxnumber" value="'.$maxnumber.'" class="maxnumbera" /></div>
        <div class="commande-tp">
            <div class="commande-tp-att">

            <div class="nb-personne" >
                <div class="adult-child">
                    <div class="titre-ad-ch"><p>Adulte(s)</p></div>
                    <div class="contente-ad-ch">
                    <button class="contente-ad-ch-bt" onclick="removeone()">-</button>
                    <input class="contente-ad-ch-inp" id="show_adultnum" type="text" name="nb" value="0" >
                    <button class="contente-ad-ch-bt" onclick="add_person()">+</button>
                    </div>
                </div>
                <div class="adult-child">
                    <div class="titre-ad-ch"><p>Enfant(s)</p></div>
                    <div class="contente-ad-ch">
                    <button class="contente-ad-ch-bt" onclick= "remove()">-</button>
                    <input class="contente-ad-ch-inp reglage-child" id="show_child10" type="text" name="nb" value="0" >
                    <button class="contente-ad-ch-bt" onclick ="addChild()">+</button>
                </div>

                </div>
            </div>

        <div class="commande-tp-att">
            <div class="preference" >
                <div class="lol">Activite :</div>
                <select id="activity10" class="select-berd" >
                    <option value="0"  selected>Pas de preference</option>
                    <option value="1">Sport</option>
                    <option value="2">Sauna</option>
                    <option value="3">All</option>
                </select>
            </div>
            <div class="preference"  id="dernier-inp">
                 <div class="lol">Plats :</div>
                <select id="Plats10" class="select-berd" >
                    <option value="0"  selected>Pas de preference</option>
                    <option value="1">Petit déjeuner</option>
                    <option value="2">Demi pension</option>
                    <option value="3">Pension complète</option>
                    <option value="4">All inclusive soft</option>
                </select>
            </div>
            <div class="bed">
                <input type="checkbox" name="bedTyp" id ="bedTyp10" value ="1" > Lit de haute qualité
            </div>
        </div>

        
        </div>
        </div>

        <div class="room-resv-tp">1. Ton reservation ____ </div>

        <div class="parametre-com-tp1">
        <div class="parametre-com-tp2">

            <div class="att-par-com-tp">
                <div class="lol">Date-Entree</div>
                <div class="contente-att-par-com-tp">
                <input id="checkin" class="att-par-com-tp-in" type="date" >
            </div>
        </div>
        <div class="att-par-com-tp">
        <div class="lol">Date-Sortie</div>
        <div class="contente-att-par-com-tp">
        <input id="checkout10" class="att-par-com-tp-in" type="date" >
    </div>
</div>
            <div class="select-par-com-tp">
            <div class="lol">Chambre(s)</div>
            <div  id="NumROOMs"class="contente-att-par-com-tp">
            <select class="select-par-com-tp-in" id="roomsnbr" >
            <option value="1"  selected>1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
            </div>
            </div>
        </div>
    </div>

    <div class="room-resv-tp">2. Special Code ____ </div>

    <div class="att-par-com-tp">
    <div class="lol">Code de promotion </div>
    <div><input type="text" id="select-berd" value="" ></div>
    <div class="falsePromo">Erreur!</div>
    <div class="ShowPromo"><span id="putpromoh"></span><span> Discount</span></div>
    <div class="btncheckpromo"><button onclick="checkpromoCode()">verifier</button></div>
    <input type="number" class="Discount-Percontage" value="" />
    </div>
    <div class="alert alert-warning" id="worningtopicdate">
  <strong>Attention!</strong> Veuillez modifier la date ou bien la nombre de chambres .
</div>
      <div class="payment"><button onclick="showpayment()">Enregistrer / Paiement</button></div>
    </div>
   <div class="switchmode" onclick="showDescrh()"><button>Reserver chambre</button></div>


    

        </div>  

';
?>
   

   
   <div class="checkifreseerd">
   <div class="alert alert-warning">
  <strong>Attention!</strong> vous avez déjà réservé cette chambre.
</div>
   </div> 

    <?php } ?>




        <script src="js/sendTopic.js"></script>
        <script src="js/reservation.js"></script>        
        <script src="js/topic.js"></script>

    <script>
    
         checkreservation(<?php echo $_GET['ID'] ; ?>) ;
         
         bringStars(<?php echo $_GET['ID'] ; ?>) ;
    </script>        
        
  <?php echo'      
        
        
        
        
        
        ' ;
    }
}

?>