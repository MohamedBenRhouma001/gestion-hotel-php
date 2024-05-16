
<!DOCTYPE html>

    <head>
      
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
         <link href="style/css.css" rel="stylesheet" >
      </head>
      <script>
        function backhome(){
            window.location = "index.php";
        }
      </script>

    <body class="bgCol">
    
      <div class="global">

        <div class="leftside1">
            <div class="return-homme"><button onclick="backhome()">Accueil</button></div>
        </div>
        <div class="rigthside1">
            <div class="imag-logo"><img src="images/logo-login.png"></div>

            <div class="register1">REGISTER</div>
            <div class="descRegister">C'EST ENTIEREMENT GRATUIT</div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
   
                <div  stype="padding : 5px" class="alert alert-warning worSignup">
                   
                </div>
                <div class="RegisterForm">
                    <div class="RegisterLabel">
                        <div class="RegisterTitel"><span>Nom</span></div>
                        <div class="RegisterInput"><input type="text" name="Username" id="name" placeholder="Votre nom" class="RegisterBtn" required></div>
                    </div>

                    <div class="RegisterLabel">
                        <div class="RegisterTitel"><span>EMAIL</span></div>
                        <div class="RegisterInput"><input type="email" name="Usermail" id="email" placeholder="Adress email" class="RegisterBtn" required></div>
                    </div>

                    <div class="RegisterLabel">
                        <div class="RegisterTitel"><span>Mot De passe</span></div>
                        <div class="RegisterInput"><input type="password" name="UserPassword" id="pwd" placeholder="*****" class="RegisterBtn" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Le mot de passe doit contenir au moins 8 caractères, dont au moins un chiffre, une lettre majuscule et une lettre minuscule."></div>
                    </div>

                    <div class="RegisterLabel">
                        <div class="RegisterTitel"><span>Confirmer Mot De passe</span></div>
                        <div class="RegisterInput"><input type="password" name="confirmPassword" id="pwd1" placeholder="*****" class="RegisterBtn" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Le mot de passe doit contenir au moins 8 caractères, dont au moins un chiffre, une lettre majuscule et une lettre minuscule."></div>
                    </div>

                    <div class="RegisterLabel">
                        <div class="RegisterTitel"><span>TEL</span></div>
                        <div class="RegisterInput"><input type="tel" name="UserTel" id="tel" placeholder="Votre numéro de téléphone" class="RegisterBtn" required></div>
                    </div>

                    <div class="RegisterLabel">
                        <div class="RegisterTitel"><span>Nationalite</span></div>
                        <div class="RegisterInput"><input type="text" name="nationaliter" id="nat" placeholder="Votre Nationalite" class="RegisterBtn" required></div>
                    </div>

                    <div class="checkbox-register">
                    <label class="cyberpunk-checkbox-label">
                    <input class="cyberpunk-checkbox" type="radio" name="type" id="check1" value="homme">homme</label>

                    <label class="cyberpunk-checkbox-label">
                    <input class="cyberpunk-checkbox" type="radio" name="type" id="check2" value="famme">femme</label>
                </div>


                <?php


if (isset($_POST["submit"])) {
    require_once('config/connect.php') ;



    // Get the form data
    $name = $_POST["Username"];
    $password = $_POST["UserPassword"];
    $confirm_password = $_POST["confirmPassword"];
    $phone_number = $_POST["UserTel"];
    $email = $_POST["Usermail"];
    $nat = $_POST["nationaliter"];
    if(isset($_POST["type"])){
    $type = $_POST["type"];}
    
     // Validate the form data
     if ($password != $confirm_password ) {

        echo '
      <script>
      document.querySelector("#name").value = "'.$name.'";
      document.querySelector("#email").value = "'.$email.'";
      document.querySelector("#tel").value = "'.$phone_number.'";
      document.querySelector("#nat").value = "'.$nat.'";
      if ("'.$type.'" === "homme") {
       document.querySelector("#check1").checked = true;
      } else {
       document.querySelector("#check2").checked = true;
      }
      document.querySelector(".worSignup").style.display = "block";
      document.querySelector(".worSignup").innerHTML = "Erreur! Verifiez votre Mot de passe.";
      </script> 
      ';

    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '
        <script>
        document.querySelector("#name").value = "'.$name.'";
        document.querySelector("#pwd").value = "'.$password.'";
        document.querySelector("#pwd1").value = "'.$confirm_password.'";
        document.querySelector("#tel").value = "'.$phone_number.'";
        document.querySelector("#nat").value = "'.$nat.'";
        if ("'.$type.'" === "homme") {
         document.querySelector("#check1").checked = true;
        } else {
         document.querySelector("#check2").checked = true;
        }
        document.querySelector(".worSignup").style.display = "block";
        document.querySelector(".worSignup").innerHTML = "Erreur! Verifiez votre email.";
        </script> 
        ';

/*
strlen($password) >= 8 : vérifie si la longueur du mot de passe est supérieure ou égale à 8 caractères.
preg_match('/\d/', $password) : utilise une expression régulière pour vérifier si le mot de passe contient au moins un chiffre.
preg_match('/[a-z]/', $password) : utilise une expression régulière pour vérifier si le mot de passe contient au moins une lettre minuscule.
preg_match('/[A-Z]/', $password) : utilise une expression régulière pour vérifier si le mot de passe contient au moins une lettre majuscule.

*/


    }else  if (strlen($password) >= 8 && preg_match('/\d/', $password) && preg_match('/[A-Z]/', $password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `client`( `mail`, `nom`, `numtel`, `password`, `nationnalite`, `type`) VALUES ('$email', '$name', '$phone_number', '$hashedPassword', '$nat', '$type')";
        $query3 = mysqli_query($connection, $sql);
        
        if ($query3) {
            $sql11 = "SELECT * FROM client WHERE nom = '$name' AND password ='$hashedPassword'";
            $query11 = mysqli_query($connection, $sql11) or die('Erreur');
            
            if (mysqli_num_rows($query11) > 0) {
                $row = mysqli_fetch_array($query11);
                //session_start();
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['nom'];
                $_SESSION['picture'] = $row['photo'];
                $_SESSION['email'] = $row['mail'];
                header('Location: index.php');
                exit;
        }
                
               

        } else {

            echo '
        <script>
        document.querySelector("#name").value = "'.$name.'";
        document.querySelector("#pwd").value = "'.$password.'";
        document.querySelector("#pwd1").value = "'.$confirm_password.'";
        document.querySelector("#tel").value = "'.$phone_number.'";
        document.querySelector("#nat").value = "'.$nat.'";
        if ("'.$type.'" === "homme") {
         document.querySelector("#check1").checked = true;
        } else {
         document.querySelector("#check2").checked = true;
        }
        document.querySelector(".worSignup").style.display = "block";
        document.querySelector(".worSignup").innerHTML = "Erreur!  désolé cette email est existe.";
        </script> 
        ';

        }

        
    }else{

        echo '
      <script>
      document.querySelector("#name").value = "'.$name.'";
      document.querySelector("#email").value = "'.$email.'";
      document.querySelector("#tel").value = "'.$phone_number.'";
      document.querySelector("#nat").value = "'.$nat.'";
      if ("'.$type.'" === "homme") {
       document.querySelector("#check1").checked = true;
      } else {
       document.querySelector("#check2").checked = true;
      }
      document.querySelector(".worSignup").style.display = "block";
      document.querySelector(".worSignup").innerHTML = "Erreur! Verifiez votre Mot de passe.";
      </script> 
      ';

    }

}
                ?>



                    <div class="RegisterSubmit">
                        <input class="registerBotton"  type="submit" value="CREATE ACCOUNT" name = "submit"> 
                    </div>

                </div>

            </form>
        </div>
    </div>
    
    </body>
</html>
