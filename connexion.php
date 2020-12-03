<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Juste Prix 2020</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php
        echo"
            <div class='container'>
            <h1>Connexion</h1>
            <form class='box' method='post' action='connexion.php'>
                <div class='champ'>
                    <input type='text' id='pseudo' name='user' placeholder='Login'>
                    <input type='passwd' id='passw' name='password' placeholder='Password'>
                    <input type='submit' id='go' name='send' placeholder=''>
                
                    <div class='nouveauCompte'>
                        <a href='creerCompte.php'>Créer un compte</a>
                    </div>
                </div>
            </form>
            </div>
        ";

        
        if(isset($_POST["send"])){

                $login = $_POST['user'];
                $password = $_POST['password'];

                echo $password;

                function getLogin($login){
                    $login = $_POST['login'];
                    return $login;
                }

                function getPassword($password){
                    $password = $_POST['password'];
                    return $password;
                }
            /*function read($csv){
                $fp=fopen("fichier.csv","r");
            
                while(!feof($fp)){
                    $ligne[]=fgetcsv($fp,1024,";");
            
                    /*if($ligne == $login and $ligne== $password){
                        echo "dans le if";
                        echo "<div class='reussi'>Connecté</div>";
                        header('Location:creerCompte.php');
                    }
                    fclose($fp);
                    return $ligne;
                
                }
            }

            
            $csv = "fichier.csv";
            $csv = read($csv);
            
            echo "<pre>";
            echo $csv;
            echo "</pre>";*/
            
            if($login == 'admin' and $password=='admin'){

                session_start();
                $_SESSION['admin']=$login;
               

                header('Location: admin.php');      
            }
            else if(($login == null) or ($login == null)){
                echo"<div class='erreur'>Connexion impossible</div>";
            }
            else{
                echo"connexion impossible";
            }    
        }
        ?>
    </body>
</html>