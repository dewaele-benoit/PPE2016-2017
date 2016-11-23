<!DOCTYPE html>


<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <script type="text/javascript" scr="menu.js"></script>
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
                <li> <a href="informations.php">Informations</a></li>
                <li><a href="productions.php">Productions</a></li>
                <li><a href="client.php">Clients</a></li>
                <li><a href="ajoutverger.php">Verger</a></li>
                <li><a href="commandeprod.php">Commande</a></li>
                
            </ul>
        </nav> 

     <article>
          <div class="form-connexion">

<h1>Ajoutez un verger</h1>
          <form method ="POST" action="ajoutverger.php"  >
    <div class="connexion">
        <label> Quel est le nom de votre verger :<br> <br><input type="text" name="nomVerger" /></label>
        <label> Quel est la superficie : <br><br><input type="texte" name="superficie" /></label>
         <label> Combien d'hectares: <br><br><input type="texte" name="hectare" /></label>
        
      </div>
    <div class="button">
     <input type="submit" name="validation" />
     <input type="submit" value="Annuler" name="annulationinscritpionclient"/>
    </div>
</form>
    </article>      
 
  <?php
     if(isset($_POST['validation']))
     {
        $nomVerger=$_POST['nomVerger'];      
        $superficie=$_POST['superficie'];
        $hectare=$_POST['hectare'];
        


        if($nomVerger&&$superficie&&$hectare)
        {
            
            $connect = mysqli_connect('localhost','root','')or die("ERROR");
            mysqli_select_db($connect,'agrur') or die("ERROR");

            $sql = "INSERT INTO vergers (nomVerger, superficie, hectare) VALUES ('$nomVerger','$superficie','$hectare')";
            mysqli_query ($connect,$sql);
            die("Enregistrement terminé <a href='accueilprod.php'>retour a la page d'accueil</a>");

        } else echo"Veuillez saisir tout les champs";

     }



            ?>

    <footer>
            <p> Site réalisé par VDEV -  Copyright © Tous droit réservés.</p>
    </footer>
    <a href="deconnexion.php">Déconnexion</a>
    </body>
</html>