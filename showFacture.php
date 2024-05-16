<?php

require_once('config/connect.php') ;


$id = $_SESSION['id'];
    $sql = "SELECT * FROM client WHERE id = $id " ;
    $query = mysqli_query($connection,$sql) ;
    if(mysqli_num_rows($query) > 0){
        $fetch = mysqli_fetch_array($query) ;
        $mail = $fetch['mail'] ;
        $nom = $fetch['nom'] ;
        $numtel = $fetch['numtel'];
        $nationnalite = $fetch['nationnalite'];
        $date = new DateTime();
        echo '
     
        <div class="content-trapez"  data-aos="fade-right">
        <div class="content-logo">   
          <div class="right-title-logo"><img src="images/logo-login.png" /></div>
          <div class="bd-right-nom">
              <div class="bd-right-n-site">Berges du Lac</div>
              <div class="bd-right-n-des">Un lieu pour découvrir et profiter de la vie .</div>
          </div>
        </div> 


        <div class="bd-left-title-text"  data-aos="fade-left">
            <div class="title-text">Facture</div>
            <div class="title-info">
                <div class="title-info-text">
                    <div class="title-info-text-left">ID Facture :</div>
                    <div class="title-info-text-right">#123456</div>
                </div>
                <div class="title-info-text">
                    <div class="title-info-text-left">Facture Date :</div>
                    <div class="title-info-text-right">';
                    echo $date->format('d F Y');
                    
                    echo'</div>
                </div>
            </div>
        </div>
    </div>
<div class="content-fact-body">
    <div class="bd-right">
        <div class="bd-right-title">facture à :</div>
        <div class="bd-right-cont">
            <div class="bd-right-cont-nom">'.$nom.'</div>
            <div class="bd-right-cont-id1"><p>Email : </p><p>'.$mail.'</p></div>
            <div class="bd-right-cont-id1"><p>Tel : </p><p>'.$numtel.'</p></div>
            <div class="bd-right-cont-id1"><p>Nationalite : </p><p>'.$nationnalite.'</p></div>
            
        </div>
    </div>
<div class="imprimer"><button id="imprimer" onclick="imprimerPage()">Imprimer</button></div>

    <div class="table" >
     <table>
      <tr>
         <th class="thid1 thtitle">ID</th>
         <th class="thid2 thtitle">Nom Chambre</th>
         <th class="thid3 thtitle">Prix</th>
         <th class="thid3 thtitle">QTY</th>
         <th class="thid3 thtitle">Total</th>
      </tr>
      ';



    $sql  = "SELECT * FROM  reservation WHERE idclient='".$_SESSION['id']."' AND checkout >'0000-00-00' AND `etatRes`='0' " ;
    $query = mysqli_query($connection ,$sql) ;
    if(mysqli_num_rows($query) > 0){
            
            $total=0;
            $tot=0;
        while($row = mysqli_fetch_array($query)){ 
            $disc = $row['codePromo'] ;
            $id = $row['id'] ;
            $id = $row['idroom'] ;
            $nbroom = (int) $row['nbrRoom'] ;
            $Price = (int) $row['Price-M'] ;
            $Price_m=0;
            $sql1  = "SELECT *  FROM  room WHERE id='".$id."' ";
    $query1 = mysqli_query($connection, $sql1) ;
    if(mysqli_num_rows($query1) > 0){
        $sousrow = mysqli_fetch_array($query1);
        
        $title =$sousrow['title'];
        $Price_m = $nbroom * $Price ;
        $tot= $tot + $Price_m ;
        $total = $total + ( $Price_m * (1 - ($disc * 0.01)));
 
        echo'
      <tr>
           <th class="thid1">'.$id.'</th>
           <th class="thid2">'.$title.'</th>
            <th class="thid3">'.$Price.' DT</th>
            <th class="thid3">'.$nbroom.'</th>
           <th class="thid3">'.$Price_m.' DT</th>
       </tr>
';

         }
    }
}




     

echo'
     </table>
    </div>


    <div class="table-foot">
        <div class="table-foot-left">
       
              <div class="SubTotal stfl" >
                <div class="text ">SubTotal :</div>
                <div class="price ">'.$tot.' DT</div>
              </div>
              <div class="Discount stfl">
                 <div class="text">Discount :</div>
                 <div class="price">'.$disc.'%</div>
              </div>
              <div class="totalpr stfl">
                 <div class="text">Total :</div>
                 <div class="totalprice">'.$total.' DT</div>
              </div>
        </div>
    </div>


  <div class="btn-fact">
    <button class="btn-fact-Later" onclick="backhome()">PLUS TARD</button> 
    <button class="btn-fact-confirm" onclick="paynaw()">Confirmer</button>
  </div>

</div>

'; 
    }
?>