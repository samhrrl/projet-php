<?php
echo "<h2> Formulaire pour connexion à admin.php</h2><hr>";
if (isset($_GET['err'])){
	$err=$_GET['err'];
	switch ($err) {
	
	case 1:
		echo "erreur, formulaire non passé";
		break;
	case 2:
	    echo "erreur, vous n'êtes pas connecté";
		break;
	case 3:
		echo "ok, vous êtes déconnecté";
		break;
	case 4:
		echo "erreur, logout sans formulaire";
		break;
	}
}

echo "<form action='action.php' method='post'>
<table>
<tr><td>id </td><td><input type='text' name='login'></td></tr>
<tr><td>label </td><td><input type='password' name='mdp'></td></tr>
<tr><td><input type='reset' name='rst' value='Annuler'></td><td><input type='submit' name='ok' value='OK'></td></tr>
</table>
</form>";
?>