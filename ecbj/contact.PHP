<?php

if(isset($_post["envoyé"])){
    extract($_post);
    if(isset($name) && $name !="" &&
    isset($email) && $email != "" &&
    isset($adresse) && $adresse != "" &&
    isset($tel) && $tel != "" )  

        $to = "lambertsamantha26100@gmail.com";
            $subject = "vous avez reçu un email de :" . $email;

            $message = "<p>vous avez reçu un message de <strong> ".$email."</strong></p>
            <p><strong>nom :</strong>".$name."</p>
            <p><strong>email :</strong>".$email."</p>
            <p><strong>adresse d'intervention :</strong>".$adresse."</p>
            <p><strong>telephone :</strong>".$tel."</p>
            <p><strong>message :</strong>".$message."</p>
            ";

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: <'.$email.'>' . "\r\n";

            $send = mail($to,$subject,$message,$headers);
            header("location:contact.php");
            if($send){
                $session['succes_message'] = "message envoyé";
            }else{
                $info = "message non envoyé";
            }

     }else{
        $info = "veuillez remplire tous les champs !";
    }
    ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style-form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<header>
    <div class="banner">
        <h1>ECBJ <br>
            Entreprise Curage Bonnay Jonathan
        </h1>
    </div>
</header>
    <form>
            <h1>Vous avez besoins d'une interventions ? ou d'infomation contacté nous !</h1>
            <?php
            if(isset($session['succes_message'])) { ?>
                <?=$info?> 
            <?php
            }
            ?>
            <div class="separation"></div>
            <div class="corpsformulaire">
            <div class="gauche">
                <div class="groupe">
                    <label>vos nom et prenom </label>
                    <input placeholder="ex: jhonn doe" type="text" name="name"required>
                    <i class="fas fa-user"></i>
                </div>

                <div class="groupe">
                    <label>votre adresse email</label>
                    <input placeholder="example@gmail.com"
 type="email"name="email"required>
                    <i class="fas fa-envelope"></i>
                    <label>adresse d'intervention</label>
                    <input placeholder="ex: 3 rue de la paix" type="text" name="adresse"required>                  <label>complément d'adresse</label>
                  <input placeholder="ex:appartement 15 3eme étage saunné interphonne 15" type="text" name="adresse"required>
                  <label>votre code postale</label>
                  <input placeholder="ex:26000" type="number"name="adresse"required>
                </div>
                <div class="groupe">
                    <label>votre telephone</label>
                    <input placeholder="ex: 06 01 02 03 04"  type="number" name="tel"required>
                    <i class="fas fa-mobile"></i>
                </div>
            </div>
                <div class="droite">
                <div class="groupe">
                    <label class="textarea"> votre message</label>
                    <textarea placeholder="saisissez votre message ici ..." name="message"required></textarea>
                </div>
            </div>
        </div>
        <div class="pieds-form" align="center">
            <button name="envoyé">envoyer le message</button>
        </div>
    </form>
    <footer>
    <strong><i><a href="#">accueil</a>   
    <a href="#">service</a>
    <a href="#">contact</a>
    <a href="#">condition d'utilisation</a>
    <a href="#">politique de confidentialité</a></i></strong>
</footer>
</body>
</html>