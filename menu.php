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
            <div class='container-menu'>
            <h1>Menu Principal</h1>
            <ul>
                <li><a href='jeu.php'>Jouer</a></li>
                <li>Historique</li>
                <li>Règles</li>
                <li>Déconnexion</li>
            </ul>
            </div>
        ";
        if(isset($_POST["send"])){
            $login = $_POST['user'];
            $password = $_POST['password'];
            if($login == 'admin' and $password=='admin'){
                echo "<div class='reussi'>Connecté</div>";
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