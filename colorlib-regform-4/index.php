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
    <title>Connexion</title>

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

    <link rel="icon" type="image/ico" sizes="700x700" href="img/icone.png">
</head>

<body>
    <?php
        
    $erreur = 0;
    if(isset($_POST["Valider"]))
    {
        if($_POST["id"]=="root" && $_POST["password"]=="root")
        {
            /*Si on a appuyé sur le bouton valider, que l'identifiant est root, et que le mot de passe est root, 
            alors nous somme identifiés. On le met dans la variable "EtatConnexion" qu'on met à "true", soit vraie. */
            $_SESSION["EtatConnexion"] = true ; 
        }

        if ($_POST["id"]!="root")
        {
            $erreur = 1;
           }
        if ($_POST["password"]!="root")
        {
            $erreur = 2;
        }
        if ($_POST["id"]!="root" && $_POST["password"]!="root")
        {
            $erreur = 3;
        }
    }

    if(isset($_SESSION["EtatConnexion"]) && $_SESSION["EtatConnexion"]==true)
    {
        //Si on est connecté, alors on redirige l'utilisateur vers la page d'accueil.
        header('Location: accueil.php');
        exit();
    }

    else{
        ?>
        <div class="page-wrapper bg-gra-05 p-t-130 p-b-100 font-poppins">
            <div class="wrapper wrapper--w680l">
                <div class="card card-4">
                    <div class="card-body">
                        <h2 class="title">Veuillez vous connecter pour acceder au super gestionnaire de l'UFC</h2>
                        <!-- Début du formulaire -->
                        <form method="POST">
                            <!-- Identifiant -->
                            <div class="col-3">  
                                <div class="input-group">        
                                    <label class="label">Identifiant</label>
                                    <input class="input--style-4" type="text" name="id" required>
                                    <div>
                                        <?php
                                        if ($erreur == 1) {
                                            echo '<div class="text-red">Ceci est un mauvais identifiant !</div>';
                                        }
                                        if ($erreur == 3) {
                                            echo '<div class="text-red">Ceci est un mauvais identifiant !</div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Mot de passe -->
                            <div class="col-3">
                                <div class="input-group">
                                    <label class="label">Mot de passe</label>
                                    <input class="input--style-4" type="text" name="password" required>
                                    <div>
                                        <?php
                                        if ($erreur == 2) {
                                            echo '<div class="text-red">Ceci est un mauvais mot de passe !</div>';
                                        }
                                        if ($erreur == 3) {
                                            echo '<div class="text-red">Ceci est un mauvais mot de passe !</div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Bouton connexion -->
                            <div class="p-t-15">
                                <button class="btn btn--radius-2 btn--blue" type="submit" name="Valider">Connexion</button>
                            </div>
                        </form>                  
                    </div>
                </div>
            </div>
        </div>
    <?php
    }



    highlight_string( file_get_contents($_SERVER['SCRIPT_FILENAME']));
    ?>

    
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