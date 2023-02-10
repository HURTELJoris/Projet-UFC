<!DOCTYPE html>
<html lang="fr">
<?php
session_start();
?>
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Accueil</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

    <link rel="icon" type="image/ico" sizes="700x700" href="img/icone.jpg">
</head>

<body>
    <?php

        if(isset($_POST["Deconnexion"]))
        {   
            //Si on appuie sur le bouton "Deconnexion", on supprime les données de la session et on la détruit.
            session_unset();
            session_destroy();
            header('Location: index.php');
            exit();
        }
        if(isset($_POST["combattant"]))
        {
            header('Location: combattant.php');
            exit();
        }
        if(isset($_POST["combat"]))
        {
            header('Location: combat.php');
            exit();
        }
   
    ?>

    
    <div class="page-wrapper bg-gra-03 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title" style="font-size:20px; text-align:center">Bienvenue sur le créateur de combats de vos rêves</h2>
                    <h3 class="title" style="font-size:20px; text-align:center">Règles</h3>
                        
                        <p class="label">- Vous devrez rentrer des noms de combattants</p>
                    
                        <p class="label">- pour les combattant il faudrat spécifier sa taille, son poids, sa nationalité, date de naissance, genre, nom et prénom</p>
                    
                        <p class="label">- la taille max est de 2.5m et un poid max de 150kg</p>
                    
                        <p class="label">- par la suite vous devrez enregistrer un combat avec les combattant de votre choix le lieux du combat et le nom du gagnant</p>
                     
                    <!-- Début du formulaire -->
                    <form method="POST">
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="combattant">Vers l'ajout d'un combattant</button>
                            
                        </div>
                        <div class="p-t-15">
                           
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="combat">Vers la création d'un combat</button>

                        </div>
                        <div class="p-t-15">
                           
                 
                           <button class="btn btn--radius-2 btn--blue" type="submit" name="Deconnexion">Deconnexion</button>
                       </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->