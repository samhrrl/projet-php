<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100&display=swap" rel="stylesheet"> 
    </head>
        
    <body>
        <div class="banner_left">
        <div id="control">Pannel de contrôle</div>
                <nav>
                    <ul>
                        <h1>Statistiques</h1>
                        <li>Noms des Joueurs</li>
                        <li>Nombres totales de parties</li>
                        <li>Pourcentages de réussite</li>
                    </ul>
                    <ul>
                        <h1>Informations</h1>
                        <li>Menu</li>
                        <li>Menu</li>
                        <li>Menu</li>
                    </ul>
                    <div class="log-out">
                        <?php
                        session_start();
                            if (isset($_SESSION['admin']) and $_SESSION['admin']=="admin"){
                                echo "bonjour <b>".$_SESSION['admin']."</b>";
                                echo "<form action='deconnexion.php' method='post'>
                                <input type='submit' name='logout' value='logout'>
                                </form>";
                            }
                        ?>
                    </div>
                </nav>
            
        </div>
<?php



echo "<div id='titleAdmin'>Page Admin</div>";
echo "<div id='titleAdmin'>Coucou</div>";
echo "<div id='titleControl'>Bienvenue sur le pannel de contrôle</div>";

echo"<div class='nomsBloc'>";

    echo"<div id='nomContainer'>Noms des joueurs</div>";
    echo"<div id='nomContainer'>Nombres totales de parties jouées</div>";
    echo"<div id='nomContainer'>Pourcentage de partie réussites</div>";
echo "</div>";

echo "<div class='containerTable'>";

$fp=fopen("fichier.csv","r");

echo "<table border='1' cellpadding='4'>";

//---------------------------
//affichage séparé de l'entête
//---------------------------
$ligne=fgetcsv($fp,1024,";");
echo"<div class='TableJoueur>'";
echo "<tr>";
foreach($ligne as $val){
        echo "<th bgcolor='#dddddd'>".$val."</th>";
}

echo "</tr>";
echo"</div>";


//---------------------------
//affichage des données
//---------------------------
while($ligne=fgetcsv($fp,1024,";")){
    echo "<tr>";//crée une ligne table html
    foreach($ligne as $val){
        echo "<td>".$val."</td>";//place dans une cellule de table html
    }
    echo "</tr>";//ferme la ligne de table html
}

echo "</table>";
fclose($fp);
$fp=fopen("fichier.csv","r");

echo "<table border='1' cellpadding='4'>";

//---------------------------
//affichage séparé de l'entête
//---------------------------
$ligne=fgetcsv($fp,1024,";");
echo"<div class='TableJoueur>'";
echo "<tr>";
foreach($ligne as $val){
        echo "<th bgcolor='#dddddd'>".$val."</th>";
}

echo "</tr>";
echo"</div>";


//---------------------------
//affichage des données
//---------------------------
while($ligne=fgetcsv($fp,1024,";")){
    echo "<tr>";//crée une ligne table html
    foreach($ligne as $val){
        echo "<td>".$val."</td>";//place dans une cellule de table html
    }
    echo "</tr>";//ferme la ligne de table html
}

echo "</table>";

fclose($fp);

$fp=fopen("fichier.csv","r");

echo "<table border='1' cellpadding='4'>";

//---------------------------
//affichage séparé de l'entête
//---------------------------
$ligne=fgetcsv($fp,1024,";");
echo"<div class='TableJoueur>'";
echo "<tr>";
foreach($ligne as $val){
        echo "<th bgcolor='#dddddd'>".$val."</th>";
}

echo "</tr>";
echo"</div>";


//---------------------------
//affichage des données
//---------------------------
while($ligne=fgetcsv($fp,1024,";")){
    echo "<tr>";//crée une ligne table html
    foreach($ligne as $val){
        echo "<td>".$val."</td>";//place dans une cellule de table html
    }
    echo "</tr>";//ferme la ligne de table html
}

echo "</table>";
fclose($fp);
echo "</div>";
echo "<div id='titleControl2'>Options avancées</div>";

function modifierMotDePasse(){

                
}
echo "<div class='advanced-options>'";
echo "<form method='post' action='admin.php'>";

echo "<fieldset><legend>Authentifications</legend>";


    echo "<h1>Changer un mot de passe</h1>";
        echo "<h3>Entrez l'utilisateur où vous changerez son mdp</h3>";
        echo "<input type='text' name='passEditing'  placeholder='Saisir le nom d'utilisateur'>";

        echo "<h3>Nouveau mot de passe</h3>";
        echo "<input type='text' name='newPassword'  placeholder='nouveau mdp'>";

        echo"<input type='submit' name='modifier'>";
    echo "</fieldset>";
echo "<fieldset><legend>Authentification</legend>";
    echo "<h1>Suppression d'un.e joueu.r.se de la platforme</h1>";
    echo "<h3>Entrez l'utilisateur où vous changerez son mdp</h3>";
    echo "<input type='text' name='passEditing'  placeholder='Saisir le nom d'utilisateur'>";

    echo "<h3>Nouveau mot de passe</h3>";
    echo "<input type='text' name='newPassword'  placeholder='nouveau mdp'>";

    echo"<input type='submit' name='modifier'>";
    

echo "</fieldset>";
echo "</div>";
    if(isset($_POST['modifier'])){

        $user = $_POST['passEditing'];
        $passwordRecup = $_POST['newPassword'];
    
        

        $file = fopen("fichier.csv", "r");
        $ligne=fgetcsv($file,1024,";");
        

        foreach($ligne as $field){
            

            if($user == $field and $passwordRecup== $field){

                echo "le mot de passe a été modifié";
                echo $user; //champ pour l'utilisateur
                echo $passwordRecup;//nouveau mot de passe
                //header('Location:creerCompte.php');
            }
            else{
                echo "joueur introuvable";
            }
            echo $field;

        }
        fclose($file);
        
        
    }

echo "</form>";



?>
</body>
</html>