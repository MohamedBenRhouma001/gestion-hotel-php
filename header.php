
<?php

$checklogin = false;
$errorshow = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $mail = trim($_POST["mail"]);
    $password = trim($_POST["password"]);

    $sql = "SELECT * FROM client WHERE mail = '$mail'";
    $query = mysqli_query($connection, $sql);

    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_array($query);
        $hashedPassword = $row['password'];
        
        if(password_verify($password, $hashedPassword)){
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['nom'];
            $_SESSION['picture'] = $row['photo'];
            $_SESSION['email'] = $mail;
            $checklogin = true;
            $errorshow = false;
        }else{
            $checklogin = false;
            $errorshow = true;
        }
    }else{
        $checklogin = false;
        $errorshow = true;
    }
}

?>
       <div id="Myapp">

       <div class="slider">
      <div class="slide" id="slide1"></div>
      <div class="slide" id="slide2"></div>
      <div class="slide" id="slide3"></div>
    </div>
                <div class="headerBar">
                    <div class="coverblack">
                    <!-- ######################### NavBAR-->
                    <div class="mag-header" data-aos="fade-in">
                      <div class="msg-wel">Bienvenue a</div>
                      <div class="msg-pla">Berges du lac </div>
                      <div class="msg-phra">Un endroit pour découvrir et profiter de la vie .</div>

                    </div>
                     <div class="navBar">
                        <!--SIte title-->
                         <div class="siteTitle">
                             <div class="siteName">

                             <div class="name" id="name">
                              <div class="phrase">
                        <div class="letter" style="color:#87815e;">B</div>
                        <div class="letter">e</div>
                        <div class="letter">r</div>
                        <div class="letter">g</div>
                        <div class="letter">e</div>
                        <div class="letter">s</div>
                        </div>
                        <div class="phrase">
                        <div class="letter">d</div>
                        <div class="letter">u</div>
                        </div>
                        <div class="phrase">
                        <div class="letter">l</div>
                        <div class="letter">a</div>
                        <div class="letter">c</div>
                      </div>
                      </div>  


                             </div>
                         </div>
            
                         <!-- Menu -->
                         <div class="NavMenu">
                             <ul class="ListMenu">
                                <li><a href="index.php">accueil</a></li>
                                <li><a href="#about">À propos de nous</a></li>
                                <?php
                                if(isset($_SESSION['id'])){
                                  echo'
                                <li><a href="contact/index.php">Contact</a></li>
                                ';}
                                ?>
                                <li><a href="#service">Chambres</a></li>
                             </ul>
                         </div>

                         <!-- Login Button-->
                         <div class="LoginForm">
                            <?php 

                             if(!isset($_SESSION['email'])){
                             ?>
                            <button class="LoginButton" data-bs-toggle="modal" data-bs-target="#signup" onclick="register()">Register</button>

                            <?php 

                             }
                             else{
                            ?>      
                            <div class="userheaderform">
                            <div class="userheaderform-right">
                                <div class="headerusername"></div>
                                <div class="headerpictureuser" onclick="showb()" ><img id="accountbgimg" src="" /></div>  
                                        </div>  
                              <div class="userheaderform-left">
                                <div class="out-head" onclick="sessiondestroy()">
                                <p>out</p>
                                <img src="https://img.icons8.com/fluency-systems-filled/48/04283a/exit.png" />
                              </div>
                                <div class="paid"><a href="panier.php"><img src="https://img.icons8.com/ios-glyphs/30/04283a/shopping-cart-with-money.png"/></a></div>
                                <div class="panie-head" onclick="showbox()"><img src="https://img.icons8.com/ios-filled/50/04283a/paid--v1.png"/></div>
                                </div> 
                                     
                                    </div>   
                                <?php }?>
                 </div>
              
           
            
                </div>
                                    
                     <!--################################panier-->
                    
        <div class="body">
           <div class="left">
                <div class="profil-back" style='display:none ;'><div class="out" onclick="closebox()">X</div>
                </div>
                <div class="img-prof"><img src="images/Capture.png" class="profil-img">
                </div>
           </div>
          <div class="rieght">

                <div class="panel">
                   
                </div>


              <div class="showach" id="showach">
                <div class="achat-des">
                  <div class="pour-margin">
                    <div class="name-col">
                      <p class="pod">  #Nom Chambre </p>
                      <p class="pod">  Prix </p>
                      <p class="pod">  Date-entree </p>
                      <p class="pod">  Date-sortie</p>
                     </div>
                    <div class="topicsach"></div>
                  </div>
                </div>
              </div>

          </div>
        </div>
<!--################################profil-->

<div class="body-profile">
           <div class="left id3">
                <div class="profil-back" style='display:none ;'><div class="out" onclick="closeb()">X</div>
                </div>
                <div class="img-prof"><img src="images/Capture.png" class="profil-img">
                </div>
           </div>
          <div class="rieght">

               <div class="update" id="update">
                    <div class="modif">Modifier les information de Votre profile !</div>
                
                <div class="modifier" id="modifier">
                    <div class="infodiv">
                        <input type="text" placeholder="nom" id="username1" class="InputMessage" />
                      </div>
                    <div class="infodiv">
                        <input type="text" placeholder="image" id="image1" class="InputMessage" />
                     </div>
                    <div class="infodiv">
                        <input type="password" placeholder="mot de passe" id="password1"name="password" class="InputMessage" />
                      </div>    
                    <div class="infodiv">
                        <input type="password" id="passconf1" placeholder="confirmer mot de passse" name="passconfirm" class="InputMessage" />
                      </div>
                    <div class="infodiv">
                        <input type="text" placeholder="@email" id="email" class="InputMessage" />
                      </div>
                   <button onclick="updateUserInfo(<?php echo $_SESSION['id'];?>)"  class="bnt">Modifier</button>
                        
                </div>
              </div>

          </div>
        </div>


                     <!--################################ Botton Headet -->
                     <div class="SiteOffers">
                        <div class="LowHeader">
                            <?php

if($checklogin == false and !isset($_SESSION['email'])){
                            ?>
                         <div class="LowHeaderLeft" data-aos="fade-right">

                         <div class="container">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method ="post">

                              <div class="title">Login</div>
                              <?php
                                   if($errorshow == true){
                                    echo "<div  stype='padding : 5px'class='alert alert-warning'>
                                    <strong>Erreur!</strong> Vous n'avez pas réussi à vous connecter, essayez à nouveau.
                                  </div>";
                                   }
                               
                              ?>
                              <div class="input-box underline">
                                <input type="text"  name="mail" class= "email" placeholder="Entre votrez Email" required>
                                <div class="underline"></div>
                              </div>
                              <div class="input-box">
                                <input type="password"  name="password" class= "pwd" placeholder="Entre votrez Mot de passe" required>
                                <div class="underline"></div>
                              </div>
                              <div class="input-box button">
                                <input type="submit" class= "btform" name="" value="Continuer">
                              </div>
                            </form>
                             <div class="oblie-pass"><a href="oblie-pass.php">Mot de passe oublié ?</a></div>
                            <div class="create-cont"><a href="signup.php">create account</a></div>
                            
                              
                          </div>


                        </div>
<?php } ?>
                               
                              
                        <div class="lowHeaderRight">  
                            
                            <!--Sildeee showwww-->
                            <div class="slidShoz">
                                   <div class="slideshowpic">
                                        <div class="PostInfoSilde">
                                          <div class="PostTileSilde"></div>
                                          <div class="PostDescSidde"></div>
                                        

                                        <div class="ParmeterSlide">
                                          <div class="prevet">
                                             <button class="prebutton" id="sildeshowbtn" onclick="perSlidePOSE()">Prevent</button>
                                          </div>

                                          <div class="readmore">
                                            <button id="sildeshowbtn">readmore</button>
                                         </div>

                                         <div class="next">
                                          <button  class="Nextbutton"id="sildeshowbtn" onclick="nextSlidePost()">next</button>
                                       </div>
                                      </div>

                                        </div>
                                   </div>
                            </div>
                            <!--Sildeee showwww-->
                        </div>
                    </div>

                     </div>

                     <!--################################ End Botton Headet -->
                    </div>
                    </div>

                    
       <div class="slider-buttons">
      <button onclick="changeSlide(0)" class="active" id="bnt1"></button>
      <button onclick="changeSlide(1)" id="bnt2"></button>
      <button onclick="changeSlide(2)" id="bnt3"></button>
    </div>
   </div>