<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Portefeuille de compétences</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>

	<form action="inscriptionProducteur.php" method="post">
		Entrez votre nom : <input type="text" name="nomProd"><br>
		Entrez votre prénom : <input type="text" name="prenomProd"><br>
		Entrez le nom de la société pour laquelle vous travaillez : <input type="text" name="nomSociete"><br>
		Entrez l'adresse de la société pour laquelle vous travaillez : <input type="text" name="adresseSociete"><br>
		Entrez le nom du responsable production : <input type="text" name="nomRespProd"><br>
		Entrez le prénom du responsable production : <input type="text" name="prenomRespProd"><br>
		<input type="submit" name="envoyerProd" value="Envoyer">
	</form>

	<?php
	//media query
    //slack

    $connect = mysqli_connect('localhost','root','')or die("ERROR");
            mysqli_select_db($connect,'agrurppe') or die("ERROR");

    if(isset($_POST['envoyerProd']))
    {
        $nom=$_POST['nomProd'];
        $prenom=$_POST['prenomProd'];
        $nomSo=$_POST['nomSociete'];
        $adresse=$_POST['adresseSociete'];
        $nomResp=$_POST['nomRespProd'];
        $prenomResp=$_POST['prenomProd'];
        $sql="INSERT INTO producteur(nomProd, prenomProd, nomSociete, adresseSociete, 
        nomRespProd, prenomRespProd) VALUES ('$nom', '$prenom', '$nomSo', '$adresse', '$nomResp', '$prenomResp')";
        mysqli_query ($connect,$sql);
        
    }
    
		
	?>

</body>
</html>