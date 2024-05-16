<?php



?>

</div>
</div>
<div class="title-offers">
<div class="topcistitleplace" id="about">recommande pour vous</div>
<div class="topcistitlep" id="about1233">PROFITEZ DES OFFRES </div>
</div>
<div class="wrap" data-aos="fade-in">

<div class="tile"> 
  <img src='images/sauna.jpg'/>
  <div class="text">
  <p id="id1">Explore plus.</p>
  <p id="id2" class="animate-text">More lorem ipsum bacon ipsum.</p>
  <p id="id3" class="animate-text">Bacon ipsum dolor amet pork belly tri-tip turducken, pancetta bresaola pork chicken meatloaf.p </p>
   
  </div>
 </div>

<div class="tile"> 
  <img src='images/Massage.jpg'/>
  <div class="text">
  <p id="id1">Explore plus.</p>
  <p id="id2" class="animate-text">More lorem ipsum bacon ipsum.</p>
  <p id="id3" class="animate-text">Bacon ipsum dolor amet pork belly tri-tip turducken, pancetta bresaola pork chicken meatloaf.p </p>
  </div>
 </div>


<div class="tile"> 
  <img src='images/soiree.jpg'/>
  <div class="text">
  <p id="id1">Explore plus.</p>
  <p id="id2" class="animate-text">More lorem ipsum bacon ipsum.</p>
  <p id="id3" class="animate-text">Bacon ipsum dolor amet pork belly tri-tip turducken, pancetta bresaola pork chicken meatloaf.p </p>
 
  </div>
 </div>

 <div class="tile"> 
  <img src='images/relaxe.jpg'/>
  <div class="text">
  <p id="id1">Explore plus.</p>
  <p id="id2" class="animate-text">More lorem ipsum bacon ipsum.</p>
  <p id="id3" class="animate-text">Bacon ipsum dolor amet pork belly tri-tip turducken, pancetta bresaola pork chicken meatloaf.p </p>
  
  </div>
 </div>
</div>
  
  
</div>


<div class="Footer">
   <div class ="up"><a href="#name"><img src="https://img.icons8.com/ios-filled/50/baae62/up--v1.png"/></a></div>
   <div class="FooterLogo">
        <div class="FooterLogoM"><img src="images/logo-login.png" /></div>
        <div class="FooterSiteName">Berges du lac</div>
   </div>
   <div class="FooterDiv">
        <div class="Footertitle">Contactez-nous</div>
        <div class="FooterContent">
        <div class="cont-ft-lgn"><img  src="https://img.icons8.com/ios-filled/50/FFFFFF/map-marker--v1.png" /> <p>53 W jackson,1401,Paris.IL 60604</p></div>
        <div class="cont-ft-lgn"><img src="https://img.icons8.com/external-others-inmotus-design/67/FFFFFF/external-Phone-game-play-others-inmotus-design.png" /> <p>50123456789</p></div>
        <div class="cont-ft-lgn"><img src="https://img.icons8.com/external-anggara-glyph-anggara-putra/32/FFFFFF/external-mail-email-interface-anggara-glyph-anggara-putra-3.png" /><p>Berges_lac@gmail.com</p></div>
        </div>
   </div>

   <div class="FooterDiv">
   <div class="Footertitle">A propos de nous</div>
        <div class="FooterContent">
        <div class="cont-ft-lgn id1"><img src="https://img.icons8.com/ios-filled/50/FFFFFF/facebook--v1.png"/> <p>Facebook</p></div>
        <div class="cont-ft-lgn id1"><img src="https://img.icons8.com/ios-filled/50/FFFFFF/twitter-squared.png"/> <p>Twitter</p></div>
        <div class="cont-ft-lgn id1 "><img src="https://img.icons8.com/ios-filled/50/FFFFFF/google-plus.png"/><p>Gmail</p></div>
        <div class="cont-ft-lgn id1"><img src="https://img.icons8.com/ios-filled/50/FFFFFF/linkedin.png"/> <p>Linkedin</p></div>
       
      </div>
    <div class="FooterContent">
    
    </div>
</div>

<div class="FooterDiv">
  <div class="Footertitle">MON COMPTE</div>
  <div class="FooterContent">
  <div class="FooterContent">
        <div class="cont-ft-lgn id1"><p>MON COMPTE</p></div>
        <div class="cont-ft-lgn id1"><p>Historique des commandes</p></div>
        <div class="cont-ft-lgn id1 "><p>Liste de souhaits</p></div>
       
      </div>
  </div>
</div>

</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-xDUL/+dQz+1J2PGy77tAVaFt85MvzAfsA8QQmX9ZDmkqbFRvz+ZxdAbA2dkOcL0l"
        crossorigin="anonymous"></script>
<script src="js/login.js"></script>
<script src="js/slide.js"></script>
<script src="js/header.js"></script>
<script src="js/letSlide.js"></script>

<script>
  var upButton = document.querySelector('.up');
  var upOffset = 700;

  window.addEventListener('scroll', function() {
    if (window.pageYOffset >= upOffset) {
      upButton.style.display = 'block';
    } else {
      upButton.style.display = 'none';
    }
  });
</script>

<script>
if (typeof <?php echo isset($_SESSION['id']) ? $_SESSION['id'] : 'undefined'; ?> !== 'undefined') {

  var reserveButton = document.querySelector('.btn-resev-topic');
  var reserveOffset = 1300;

  window.addEventListener('scroll', function() {
    if (window.pageYOffset >= reserveOffset) {
      reserveButton.style.display = 'block';
    } else {
      reserveButton.style.display = 'none';
    }
  });}
</script>


<script>
  <?php if(isset($_SESSION['id'])){
    echo'
    showtopics();
   getachattopics('. $_SESSION['id'] .') ;
    checkinfo('. $_SESSION['id'] .') ;
    mainUpdateUser('. $_SESSION['id'] .') ;
    ';
} ?>
  </script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({duration: 1400});
  </script>

    </body>
</html>