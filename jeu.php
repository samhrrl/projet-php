<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Juste Prix 2020</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class='container'>
        <h1>Jeu</h1>
        <table>
            <form method='post' action=''>
                <tr>
                    <td>Valeur : </td>
                    <td>
                        <input name='valeur' type='number'>
                        <input type='submit' value="Aide" name='help'>
                    </td>
                </tr>
                <td>
                    <input name='ok' type='submit'></td>

                    <?php

                        $user_value = $_POST['valeur'];
                        $help_button = $_POST['help'];

                        function    reset_cookie(): void
                        {
                            setcookie('score', 0, time() + 3600);
                            setcookie("nb", rand(0, 100), time() + 3600);
                        }
                        
                        
                        if (isset($_POST)) {
                            // Si le cookie n'existe pas, je le cree
                            if (!isset($_COOKIE['score']))
                                setcookie("score", 0, time() + 3600);
                            // Si le cookie n'existe pas, je le cree
                            if (!isset($_COOKIE['nb']))
                                setcookie("nb", rand(0, 100), time() + 3600);
                                
                        

                            // je recupere la valeur soumise par l'utilisateur
                            
                                                   
                            // Si la valeur soumise est la bonne valeure
                            if ($user_value == $_COOKIE['nb']) {
                                echo "Bravo ! La valeur est " . $_COOKIE['nb'] . "\n";
                                echo "<img src='image/bravo.gif' width='80%'>";
                                reset_cookie();
                        } else if ($user_value != $_COOKIE['nb']) {
                            if ($_COOKIE['score'] > 0){
                                echo "Retente ta chance !";
                                if($user_value < $_COOKIE['nb'])
                                    echo"Je pense à une valeur supérieure";
                                if($user_value > $_COOKIE['nb'])
                                    echo"Je pense à une valeur inférieure";
                            }
                            if ($_COOKIE['score'] < 10)
                                setcookie('score', ($_COOKIE['score'] + 1), time() + 3600);
                            else
                                reset_cookie();
                        }
                        if(isset($_POST['help'])){
                            echo "Réponse:".$_COOKIE['nb'];
                        }
                        
                    }
                ?>
                </tr>
            </form>
        </table>
        <div class='jeuVersMenu'><a href='menu.php'>Menu principal</a></div>
    </div>
</body>
</html>

