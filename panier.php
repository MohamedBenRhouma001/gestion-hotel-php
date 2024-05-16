<html>
 <head>
 <link href="style/css.css" rel="stylesheet" >
 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
 <body>
      <div class="content-panier "  >
         <div class="title-panier" data-aos="fade-in">Mon panier</div>
         <div class=bt-panier>
                <button class="select-p" onclick="sel()">les choix</button>
                <button class="reserve-p"onclick="res()">reserve</button>
            </div>
         <div class="cont-panier " >
           
          <div class="slect_cont_panier">  
             <div class="panier-item" >
                <div class="panier-item-head" >
                  <div class="head-title" >id</div>
                    <div class="head-title tit-des" >Description</div>
                    <div class="head-title" >Price</div>
                    <div class="head-title" ></div>
                </div>
                <div id="cont-item-select" >
                  
                   
                  
                </div>
                
             </div>
             <div class="panier-footer reserve" >
              <div class="panier-footer-homme" >
              <img src="https://img.icons8.com/ios-glyphs/30/81826d/left.png">
              <a href="http://localhost/Project-pfe/">Continuer vos achats</a></div>
              <?php
              require_once('config/connect.php') ;
              $userid = $_SESSION['id'];
              $sql = "SELECT * FROM reservation WHERE `idclient` = '".$userid."' AND `etatRes`= '0' AND `Price-M`='0' " ;
              $query = mysqli_query($connection ,$sql) ;
              if(mysqli_num_rows($query) > 0){
               echo'<button onclick="allReservation()" class="reserv-all-top">ReserverTout</button>';}
               ?>
              
             </div>
          </div>
 
           <div class="reserve_cont_panier">  
             <div class="panier-item" >
                <div class="panier-item-head" >
                    <div class="head-title tit-des" >Description</div>
                    <div class="head-title" >Price</div>
                    <div class="head-title" >QTY</div>
                    <div class="head-title" >Total</div>
                    <div class="head-title" ></div>
                </div>
                <div id="cont_item_res">
                
                </div>
                
             </div>
             <div class="panier-footer" >
              <div class="panier-footer-homme" >
              <img src="https://img.icons8.com/ios-glyphs/30/81826d/left.png">
              <a href="http://localhost/Project/">Continuer vos achats</a>
              </div>
              <?php
              require_once('config/connect.php') ;
              $userid = $_SESSION['id'];
               $sql = "SELECT * FROM reservation WHERE `idclient` = '".$userid."' AND `etatRes`= '0' AND checkout >'0000-00-00'" ;
               $query = mysqli_query($connection ,$sql) ;
               if(mysqli_num_rows($query) > 0){
               echo'<button onclick="paynaw()" class="select-all-top">ConfirmerTout</button>';}
               ?>
             </div>
           </div>
         </div> 
         
         <div class="space"></div>
      </div>    

    



<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init({
  duration: 1200,
})

</script>
<script src="js/reserv-all-topic-sel.js"></script>
<script src="js/header.js"></script>
<script>
  getresertopics();
  getselectopics();
</script>

 </body>
</html>