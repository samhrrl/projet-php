<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Juste Prix 2020</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php
        $x = rand(0,10);
        $y = rand(0,10);

        $captcha = $x+$y;

        $afficher = $captcha."=".$x."+". $y;
        echo"
            <div class='container'>
            <h1>Inscription</h1>
            <form class='box' method='post' action='creerCompte.php'>
                <div class='champ'>
                    <input type='text' id='pseudo' name='user' placeholder='Login'>
                    <input type='passwd' id='passw' name='password' placeholder='Password'>
                    <div class='nouveauCompte'>
                        Captcha
                        <input type='number' name='verification' placeholder ='$afficher'>
                        
                    </div>
                    <input type='submit' id='go' name='send' placeholder=''>
                    <div class='connect'><a href='connexion.php'>Se connecter</a></div>
                </div>
            </form>
            </div>
        ";
        function reset_cookie(): void
                {
                setcookie('captcha', 0, time() + 3600);
                }
        
        if(isset($_POST["send"])){

            if (!isset($_COOKIE['captcha'])){
                setcookie("captcha", 0, time() + 3600);
            }//on le créer s'il nexiste pas
            
            $login = $_POST['user'];
            $password = $_POST['password'];
            $resultatCaptcha = $_POST['verification'];
            $RecupereCaptcha = $_COOKIE['captcha'];
            echo password_hash("admin",PASSWORD_DEFAULT);

            echo "captacha user".$resultatCaptcha;
            echo "captcha cookie".$RecupereCaptcha;
            
            if ($resultatCaptcha == $_COOKIE['captcha']) {
                echo"bon captcha";
                reset_cookie();
            }
            else{
                echo "mauvais captcha";
            }

            $list=array(
                array($login,$password)
            );
            $fp=fopen("fichier.csv","a+");
                foreach($list as $field){
                    fputcsv($fp,$field,";");
                }

            $rst = (int)$resultatCaptcha;
            //echo "resultat captcha =".getType($rst)."\n";
            //echo "captcha =".getType($captcha);
            //echo "captcha".$captcha;
            //echo "resultat captcha".$resultatCaptcha;
            if($login=='admin' and $password='admin'){


                if(getType($captcha) === getType($rst)){
                    echo"<div class='reussi'>Inscription réussie</div>";

                }
            }
            else{
                echo "<div class='erreur'>inscription refusée</div>";
                header('Location: creerCompte.php');
                echo "FAUX";
            }
            
   
        }
      
        ?>
    </body>
</html>