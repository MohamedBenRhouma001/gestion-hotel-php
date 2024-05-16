<div class="bd-pay">
        <div class="headpy">
            <div class="outk"onclick="outpay()"><p id="p-out">X </p></div>
           <div class="logo-img-py-t"><img id="logo" src="../images/Capture.PNG"></div>
        </div>
       <div class="content_paiement">
        <div class="des-page">
        <p class="nom_site">Berges du Lac</p>
   
       
   </div>

        <p class="select"> veuillez choisir le mode de paiement</p>        
        </div>
        <div class="typepy">
            <div class="imgpy"><img onclick="onlick1()" id="imgpy" src="../images/mastercard.jpg"></div>
            <div class="imgpy"><img  onclick="onlick2()" id="imgpy" src="../images/paypal.jpg"></div>
            <div class="imgpy"><img  onclick="onlick3()" id="imgpy" src="../images/bitcoin.jpg"></div>
        </div>
        <div class="conpy">
              <div class="centing">
            <div class="typpy" id="m1m">
                <div class="textpy">Numero Carte</div>
                <div class="inppy"><input type="text"></div>
                <div class="textpy">Expiry Date</div>
                <div class="inppy"><input type="date"></div>
                <div class="textpy">CVV</div>
                <div class="inppy"><input type="password"></div>

            </div>
        
        <div class="typpy" id="m2m" >
            <div class="textpy">Email</div>
                <div class="inppy"><input type="email"></div>
                <div class="textpy">Mot de Passe</div>
                <div class="inppy"><input type="password"></div>
        </div>
        <div class="typpy" id="m3m">
            <div class="textpy">Bitcoin Address</div>
                <div class="inppy"><input type="email"></div>
                <div class="textpy">Amount (BTC)</div>
                <div class="inppy"><input type="password"></div>
        </div>
    </div>
    </div>
    
    <div class="checpy">
  <button class="check-butt" 
    <?php 
      if (isset($_GET['id'])) {
        echo "onclick=\"insertinfo('" . $_GET['id'] . "');\"";
      } else {
        echo "onclick=\"insertinfo1();\"";
      }
    ?>
    id="checkpy">envoiyer
  </button>
</div>


       </div>

  