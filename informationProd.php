<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <script type="text/javascript" scr="menu.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <title>AGRUR</title>
    </head>

    <body>
    <header>
    <div id="logo">    
           <img class="img" src="logo.jpg" width="225" height="150" alt="" title="logo" />         
     </div>  
     </header> 
     </section>
        <nav>   
            <ul id="menu">
                <li><a href="accueilprod.php"> Accueil</a></li>
                <li> <a href="informationProd.php">Informations</a></li>
                <li><a href="productions.php">Productions</a></li>
                <li><a href="client.php">Clients</a></li>
                <li><a href="ajoutverger.php">Verger</a></li>
                <li><a href="commandeprod.php">Commande</a></li>
                
            </ul>
        </nav> 

     <article>
          <div class="form-connexion">

<h1>Ajoutez vos informations personnels</h1>
          <form method ="POST" action="informationProd.php"  >
    <div class="connexion">
        <label>Votre nom :<br> <br><input type="text" name="nomProd"></label>
        <label>Votre prénom :<br><br><input type="text" name="prenomProd"></label>
         <label>Le nom de la société pour laquelle vous travaillez :<br><br><input type="text" name="nomSociete"></label>
          <label>L'adresse de la société pour laquelle vous travaillez : <br><br><input type="text" name="adresseSociete"></label>
         <label>Le nom du responsable production : <br><br><input type="text" name="nomRespProd"></label>
         <label>Le prénom du responsable production :<br><br><input type="text" name="prenomRespProd"></label>
          <label>Date d'adhésion* : </label>
        <input type="" name="dateAd" id="dateAd"><br><br>
        <label>Votre login :<br> <br><input type="text" name="loginProd"></label>
        <label>Votre mot de passe :<br> <br><input type="password" name="mdpProd"></label>
         <label>* champs obligatoire</label>

      </div>
    <div class="button">
      <input type="submit" name="envoyerProd" value="Envoyer">
     <input type="submit" value="Annuler" name="annulationinscritpion"/>
    </div>
</form>
    </article>      
 
 <?php
  //media query
    //slack
  session_start();
    if (isset($_SESSION['login'])){
        $loginP = $_SESSION['login'];
    }
    else{
        echo "erreur";
    }

    $connect = mysqli_connect('localhost','root','')or die("ERROR");
            mysqli_select_db($connect,'agrur') or die("ERROR");

    if(isset($_POST['envoyerProd']))
    {
        $nom=$_POST['nomProd'];
        $prenom=$_POST['prenomProd'];
        $nomSo=$_POST['nomSociete'];
        $adresse=$_POST['adresseSociete'];
        $nomResp=$_POST['nomRespProd'];
        $prenomResp=$_POST['prenomProd'];
        $login=$_POST['loginProd'];
        $tempProd=$_POST['mdpProd'];
        $mdpProd = crypt($tempProd,'$2a$11$'.md5($tempProd).'$');
        $sql="UPDATE producteur SET nomProd='$nom',prenomProd='$prenom',nomSociete='$nomSo',adresseSociete='$adresse',nomRespProd='$nomResp',prenomRespProd='prenomResp',loginProd='loginProd',mdpProd='$mdp' WHERE loginProd='$loginP'";
        mysqli_query ($connect,$sql);
    }
    
    
  ?>

    <footer>
            <p> Site réalisé par VDEV -  Copyright © Tous droit réservés.</p>
    </footer>
    <a href="deconnexion.php">Déconnexion</a>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="app.js"></script>
</html>