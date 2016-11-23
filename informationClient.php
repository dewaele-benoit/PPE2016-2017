<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Information Clients</title>
    <link href="" rel="stylesheet">
</head>
<body>

	<form action="informationClient.php" method="post">
		Votre nom : <input type="text" name="nomC"><br>
		Votre adresse : <input type="text" name="adresseC"><br>
		Le nom du responsable de vos achat : <input type="text" name="nomRespAchatC"><br>
        Votre login : <input type="text" name="loginC"><br>
        Modifier mdp : <input type="password" name="mdpC"><br>
		<input type="submit" name="envoyerClient" value="Envoyer">
	</form>

	<?php
	//media query
    //slack
    session_start();
    if (isset($_SESSION['login'])){
        $loginC = $_SESSION['login'];
    }
    else{
        echo "erreur";
    }


    $connect = mysqli_connect('localhost','root','')or die("ERROR");
            mysqli_select_db($connect,'agrurppe') or die("ERROR");

    if(isset($_POST['envoyerClient']))
    {
        $nom=$_POST['nomC'];
        $adresse=$_POST['adresseC'];
        $nomResp=$_POST['nomRespAchatC'];
        $login=$_POST['loginC'];
        $tempClient=$_POST['mdpC'];
        $mdpClient = crypt($tempClient,'$2a$11$'.md5($tempClient).'$'); 

        $sql="UPDATE client SET nomClient='$nom',adresseClient='$adresse',nomRespAchat='$nomResp',loginClient='$login',mdpClient='$mdpClient' WHERE loginClient='$loginC'";
        //recupérer login entré lors de la connexion 
        mysqli_query ($connect,$sql);
    }
    
		
	?>

</body>
</html>