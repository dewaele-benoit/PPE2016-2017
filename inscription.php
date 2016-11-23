<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <script type="text/javascript" scr="menu.js"></script>
        <title> AGRUR</title>
    </head>

    <body>
    <header>
    <div id="logo">    
           <img class="img" src="logo.jpg" width="225" height="150" alt="" title="logo" />         
     </div>  
     </header> 
     
     
     
          <div class="form-connexion">
<h1>Inscritpion</h1>
<form method ="POST" action="inscription.php"  >
    <div class="connexion">
        <h1>Client</h1>
        <label> Entrez votre login :<br> <br><input type="text" name="loginClient" /></label>
        <label> Entrez votre mot de passe : <br><br><input type="password" name="mdpClient" /></label>
        <!--<label> Etes-vous un : <br><br>
            <input type= "radio" name="profil" value="client"> Client
            <input type= "radio" name="profil" value="producteur"> Producteur</label>-->
        <label> Entrez votre nom  : <br><br><input type="text" name="nomClient" /></label>
      </div>
      <div class="connexion">
        <h1>Producteur</h1>
        <label> Entrez votre login :<br> <br><input type="text" name="loginProd" /></label>
        <label> Entrez votre mot de passe : <br><br><input type="password" name="mdpProd" /></label>
        <!--<label> Etes-vous un : <br><br>
            <input type= "radio" name="profil" value="client"> Client
            <input type= "radio" name="profil" value="producteur"> Producteur</label>-->
        <label> Entrez votre nom  : <br><br><input type="text" name="nomProd" /></label>
        <label> Entrez votre prenomnom  : <br><br><input type="text" name="prenomProd" /></label>
      </div>
      
    <div class="button-connexion">
     <input type="submit" name="validationconnexion" />
     <input type="submit" value="Annuler" name="annulationinscritpionclient"/>
    </div>
</form>
</div>
  <?php
    
     if(isset($_POST['validationconnexion']) )
     {  
        
        $loginClient=$_POST['loginClient'];
        $tempClient=$_POST['mdpClient'];
        $mdpClient = crypt($tempClient,'$2a$11$'.md5($tempClient).'$');  
        $nomClient=$_POST['nomClient'];

        $loginProd=$_POST['loginProd'];
        $tempProd=$_POST['mdpProd'];
        $mdpProd = crypt($tempProd,'$2a$11$'.md5($tempProd).'$');  
        $nomProd=$_POST['nomProd'];
        $prenomProd=$_POST['prenomProd'];


        if($loginClient&&$mdpClient&&$nomClient)
        {
            
            $connect = mysqli_connect('localhost','root','')or die("ERROR");
            mysqli_select_db($connect,'agrurppe') or die("ERROR");

            $flag=0;
            $req="SELECT loginClient FROM  client";
            $result= mysqli_query($connect, $req);
            while ($row = $result->fetch_assoc()) {
              if($row['loginClient']==$loginClient){
                $flag=1;
              }
            }
            if ($flag==1){
              echo "Le login est utilisé";
            }else{
              $sql = "INSERT INTO client(nomCLient,loginClient,mdpClient) VALUES ('$nomClient','$loginClient','$mdpClient')";
              mysqli_query ($connect,$sql);
              die("Inscription terminée Client <a href='connexion.php'>connectez vous</a>");
            }

        } elseif($loginProd&&$mdpProd&&$nomProd&&$prenomProd){
            $connect = mysqli_connect('localhost','root','')or die("ERROR");
            mysqli_select_db($connect,'agrurppe') or die("ERROR");

            $flag=0;
            $req="SELECT loginProd FROM  producteur";
            $result= mysqli_query($connect, $req);
            while ($row = $result->fetch_assoc()) {
              if($row['loginProd']==$loginProd){
                $flag=1;
              }
            }
            if ($flag==1){
              echo "Le login est utilisé";
            }else{

            $sql = "INSERT INTO producteur(nomProd,prenomProd,loginProd,mdpProd) VALUES ('$nomProd','$prenomProd','$loginProd','$mdpProd')";
            mysqli_query ($connect,$sql);
            die("Inscription Producteur terminée <a href='connexion.php'>connectez vous</a>");
          }

        } else echo"Veuillez saisir tout les champs";
        


     }



            ?>

    <footer>
            <p> Site réalisé par VDEV -  Copyright © Tous droit réservés.</p>
    </footer>

    </body>
</html>
