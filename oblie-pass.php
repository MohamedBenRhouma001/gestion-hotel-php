
<!DOCTYPE html>

<head>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="style/css.css" rel="stylesheet" >
    <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
<style>
  html {
    margin: 0;
    height: 100%;
}
</style>

</head>

<body class = "bd-back-col">



<?php
require_once('config/connect.php') ;
$checklogin = false ;
$errorshow = false ;






if(isset($_POST['submit1'])) {
    $maile = trim($_POST["mail"]);
    
    $sql = "SELECT * FROM client WHERE mail = '$maile' ";
    $query = mysqli_query($connection ,$sql) ;
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_array($query);
        $randomCode = rand(100000, 999999);

// Stocker une valeur dans un cookie pour 15 min
        setcookie('mail', $maile , time() + 900);
        
        $hashedCode = password_hash($randomCode, PASSWORD_DEFAULT);
        $upcode = "UPDATE `client` SET `codeVerif`='".$hashedCode."' WHERE mail = '".$maile."' ";
             mysqli_query($connection ,$upcode) ;
        $stape1 =true ;
        require_once 'mail.php';
        $mail->setFrom('mouhamedbenrhouma0@gmail.com','admin');
        $mail->addAddress($maile);
        $mail->Subject = "Forgot Password";
        $mail->Body = "Your Code is : ".$randomCode;
        $mail->send();
    }else{
            $checklogin =false ;
            $errorshow = true ;
            
        }
}
if(isset($_POST['submit2'])) {
  // Récupérer la valeur du cookie
  $mail = $_COOKIE['mail'];
  $password = trim($_POST["password"]);
  $code = trim($_POST["code"]);
  $hashedCode2656 = ""; // Initialisation de la variable $hashedCode2656

  if (!empty($code)) {
      echo "<script> console.log('".$code."'); </script>"; 
      $hashedCode2656 = password_hash($code, PASSWORD_DEFAULT);
      echo "<script> console.log('".$hashedCode2656."'); </script>"; 
  }

  /* AND codeVerif ='".$hashedCode2656."' */
  $sql121 = "SELECT * FROM client WHERE mail = '".$mail. "'  " ;
  $query121 = mysqli_query($connection ,$sql121) or die ('error') ;
  if(mysqli_num_rows($query121) > 0){  
      if (!empty($password)) {
          $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
          $upsql = "UPDATE `client` SET `password`='".$hashedPassword."' WHERE mail = '".$mail."' ";
          $queryup = mysqli_query($connection ,$upsql) ;
          if ($queryup == TRUE) {
              $sql11 = "SELECT * FROM client WHERE mail = '".$mail."' AND password ='".$hashedPassword."'" ;
              $query11 = mysqli_query($connection ,$sql11) or die ('error') ;  
              $row = mysqli_fetch_array($query11);
              $_SESSION['id'] = $row['id'] ;
              $_SESSION['username'] = $row['nom'] ;
              $_SESSION['picture'] = $row['photo'] ;
              $_SESSION['email'] = $row['mail'] ;
              header('Location: index.php') ;
          }
      } else {
          $codeincorrect = true ;
      }
  } else {
      $codeincorrect = true ;
  }
}

?>


<div class="bd-ob-pas">


        <div class="head-ob-pas" id="whidhheadpy">
            <div class="outk"onclick="home3()"><p id="g-hom">X </p></div>
           <div class="logo-img"><img id="logo1" src="images/logo-login.png"></div>

        </div>
       
        <div class="content-ver">


                            <form  method ="post">

                              <div class="title-for">Mot de passe oublier </div>

                              <div class="input-mail">
                                <input type="text"  name="mail" class= "checkemail" placeholder="Envoyez votre e-mail" required>
                                <div class="underlinefor1"></div>
                              </div>
                              
                              <div class="input-bt-check">
                                <input type="submit" class= "btform" name="submit1" value="Verifier">
                              </div>
                            </form>
                              
                          </div>




                          <div class="content-chang" style="display:none;">


                            <form  method ="post">

                            <div class="return" onclick="returnboxverif()"><img  src="https://img.icons8.com/ios-glyphs/30/8b9171/left.png"/></div>

                              <div class="input-mail">
                                <input type="text"  name="code" class= "checkemail" placeholder="Envoiye votre code" required>
                                <div class="underlinefor1"></div>
                              </div>
                              <div class="input-mail">
                                <input type="password"  name="password" class= "checkemail" placeholder="nouvelle mot de passe" required>
                                <div class="underlinefor1"></div>
                              </div>

                              <div class="input-bt-change">
                                <input type="submit" class= "btformchange" name="submit2" value="changer">
                              </div>
                            </form>
                              
                          </div>




                          
                          <?php
if ($checklogin == true) {
    echo '<div class="alert alert-success msgreponse">
              <strong>Success!</strong> s il vous plait consultez votre mail.
          </div>';
}
?>
<?php
if ($errorshow == true) {
    echo '<div class="alert alert-danger msgreponse">
              <strong>desole!</strong> Je ne recois aucun e-mail de ce type.
          </div>';
}
?>
<?php
if (isset($codeincorrect)) {
    echo '<div class="alert alert-danger msgreponse">
            <strong>desole!</strong> Veuillez réessayer. 
          </div>';

}
?>

                           

                        </div>

                      
                          
                               
                             
      
</div>  

<script src="js/sendTopic.js"></script>
<script src="js/reservation.js"></script>
<?php  if (isset($stape1 )) {
        
            echo '<script>
            showboxverif('.$stape1.');
         </script>
                    ';
          }
          ?>
</body>
</html>