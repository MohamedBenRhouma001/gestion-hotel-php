<html>
     <head>
     
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="style/css.css" rel="stylesheet" >
 <link href="https://fonts.googleapis.com/css?family=Unica+One" rel="stylesheet">

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="style/css.css" rel="stylesheet" >
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lancelot&display=swap">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/1.0.0/anime.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fleur+De+Leah&display=swap" rel="stylesheet">
     </head>
     
     <body>

     <div class="TopicHeadder">
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
          
          
        </div> 
    </div>
</div>

<div class="reserv-all-tp">
        <div class="room-resv-tp">Chambre #1</div>
        <div class="room-resv-tp">1. Option </div>
        <div class="commande-tp">
            <div class="commande-tp-att">

            
            <div class="preference" >
                <div class="lol">Activite :</div>
                <select id="activity" class="select-berd" >
                    <option value="0"  selected>Pas de preference</option>
                    <option value="1">Sport</option>
                    <option value="2">Sauna</option>
                    <option value="3">All</option>
                </select>
            </div>
            <div class="preference"  id="dernier-inp">
                 <div class="lol">Plats :</div>
                <select id="Plats" class="select-berd" >
                    <option value="0"  selected>Pas de preference</option>
                    <option value="1">Petit déjeuner</option>
                    <option value="2">Demi pension</option>
                    <option value="3">Pension complète</option>
                    <option value="4">All inclusive soft</option>
                </select>
            </div>
            <div class="bed">
                <input type="checkbox" name="bedTyp" id ="bedTyp" value ="1" > Lit de haute qualité 
            </div>
        </div>
        </div>

        <div class="room-resv-tp">2. Ton reservation ____ </div>

        <div class="parametre-com-tp1">
        <div class="parametre-com-tp2">

            <div class="att-par-com-tp">
                <div class="lol">Date-Entree</div>
                <div class="contente-att-par-com-tp">
                <input id="checkin" class="att-par-com-tp-in" type="date" >
            </div>
        </div>
            <div class="att-par-com-tp" id="dernier-inp">
                <div class="lol"> Date-Sortie</div>
                <div class="contente-att-par-com-tp">
                <input id="checkout"class="att-par-com-tp-in" type="date" >
            </div>
        </div>
           
        </div>
    </div>

    <div class="room-resv-tp">3. Special Code ____ </div>

    <div class="att-par-com-tp">
    <div class="lol">Code de promotion </div>
    <div><input type="text" id="select-berd" value="" ></div>
    <div class="falsePromo">Erreur!</div>
    <div class="ShowPromo"><span id="putpromoh"></span><span> Discount</span></div>
    <div class="btncheckpromo"><button onclick="checkpromoCode()">verifier</button></div>
    <input type="number" class="Discount-Percontage" value="" />
    </div>
      <div class="payment-worning"></div>
      <div class="payment">
    <button <?php 
    if (isset($_GET['id'])) {
        echo 'onclick="update_Payment1('.$_GET['id'].')"';
    } else {
        echo 'onclick="update_Payment()"';
    }
    ?>>Enregistrer / Paiement</button>
</div>

      
    </div>   

        </div>  

   <script src="js/sendTopic.js"></script>
    </body>


</html>