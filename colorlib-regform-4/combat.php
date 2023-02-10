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
    <title>Création du combat</title>

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
        
        try {
            $ipserver ="192.168.65.167";
            $nomBase = "jeux";
            $loginPrivilege ="root";
            $passPrivilege ="root";
        
            $GLOBALS["pdo"] = new PDO('mysql:host=' . $ipserver . ';dbname=' . $nomBase . '', $loginPrivilege, $passPrivilege);

            $requete = "select * from combatant";
            $resultat = $GLOBALS["pdo"]->query($requete);
            //resultat est du coup un objet de type PDOStatement
            $tabCombatant = $resultat->fetchALL();

            $requete2 = "select * from lieux1";
            $resultat2 = $GLOBALS["pdo"]->query($requete2);
            //resultat est du coup un objet de type PDOStatement
            $tabLieux1 = $resultat2->fetchALL();


            if(isset($_POST["Deconnexion"]))
            {   
                //Si on appuie sur le bouton "Deconnexion", on supprime les données de la session et on la détruit.
                session_unset();
                session_destroy();
                header('Location: index.php');
                exit();
            }

            $erreur = 0;
            if(isset($_POST["Valider"]))
            {
                if ($_POST["combattant1"] != $_POST["combattant2"] && ( $_POST["gagnant"] == $_POST["combattant1"] || $_POST["gagnant"] == $_POST["combattant2"] ) ){
                    
                    $requete4 = "INSERT INTO `combat`(idcombatant1, idcombatant2, idjwin, idlieux, ddateheure) VALUES ('" .$_POST["combattant1"]. "','".$_POST["combattant2"]."','".$_POST["gagnant"]."','".$_POST["llieux"]."','".$_POST["datecombat"]."')";
                    $resultat4 = $GLOBALS["pdo"]->query($requete4);
                    //resultat est du coup un objet de type PDOStatement
                    header('Location: accueil.php');
                    exit();
                }
               else if ($_POST["combattant1"] == $_POST["combattant2"]){
                //echo"Un combattant ne peut pas se combattre lui-meme !";
                $erreur = 1;
               }
               else if ($_POST["gagnant"] != $_POST["combattant1"] || $_POST["gagnant"] != $_POST["combattant2"]){
                //echo"Le gagnant est forcement un des deux combattants !";
                $erreur = 2;
               }
               else if ($_POST["combattant1"] == $_POST["combattant2"] && $_POST["gagnant"] != $_POST["combattant1"] || $_POST["gagnant"] != $_POST["combattant2"]){
                //echo"Un combattant ne peut pas se combattre lui-meme !";
                //echo"Le gagnant est forcement un des deux combattants !";
                $erreur = 3;
               }
            }

            if(isset($_POST["Accueil"]))
            {
                header('Location: accueil.php');
                exit();
            }

        
            ?>
            <div class="page-wrapper bg-gra-04 p-t-130 p-b-100 font-poppins">
                <div class="wrapper wrapper--w680l">
                    <div class="card card-4">
                        <div class="card-body">
                            <h2 class="title">Création d'un combat UFC</h2>
                            <!-- Début du formulaire -->
                            <form method="POST">
                                <div class="input-group">
                                    <!-- Lieu -->
                                    <label class="label">Selectionnez le lieu du combat</label>
                                    <div class="rs-select2 js-select-simple select--no-search"> 
                                        <select name="llieux" required>
                                            <option value disabled="disabled" selected="selected">Lieu</option>
                                            <?php
                                            foreach ($tabLieux1 as $Lieux) {
                                                ?>
                                                <option value="<?=$Lieux["id"]?>"><?=$Lieux["nom"]?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    <!-- Date de naissance -->
                                    <div class="col-2">
                                        <div class="input-group">
                                            <label class="label">Date du combat</label>
                                            <div class="input-group-icon">
                                                <input class="input--style-4" type="datetime-local" name="datecombat" required>          
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Combattant 1 -->
                                    <label class="label">Selectionnez le combattant 1</label>
                                        <select name="combattant1" required>
                                            <option value disabled="disabled" selected="selected">Combattant 1</option>
                                            <?php
                                            foreach ($tabCombatant as $Combattant) {
                                                ?>
                                                <option value="<?=$Combattant["id"]?>"><?=$Combattant["nom"]." ".$Combattant["prenom"]?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <div class="select-dropdown"></div>
                                         <!-- Combattant 2 -->
                                        <label class="label">Selectionnez le combattant 2</label>
                                        <select name="combattant2" required>
                                            <option value disabled="disabled" selected="selected">Combattant 2</option>
                                            <?php
                                            foreach ($tabCombatant as $Combattant) {
                                                ?>
                                                <option value="<?=$Combattant["id"]?>"><?=$Combattant["nom"]." ".$Combattant["prenom"]?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                         <!-- Gagnant -->
                                        <label class="label">Selectionnez le gagnant du combat</label>
                                        <select name="gagnant" required>
                                            <option value disabled="disabled" selected="selected">Gagnant</option>
                                            <?php
                                            foreach ($tabCombatant as $Combattant) {
                                                ?>
                                                <option value="<?=$Combattant["id"]?>"><?=$Combattant["nom"]." ".$Combattant["prenom"]?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- Bouton envoyer -->
                                <div class="p-t-15">
                                    <button class="btn btn--radius-2 btn--blue" type="submit" name="Valider">Envoyer</button>
                                </div>
                            </form>
                            <!-- Boutons en dehors du formulaire pour qu'ils soient indépendants de sa complétion -->
                            <form action="" method="post" class="form-example">
                                <!-- Bouton accueil -->
                                <div class="p-t-15">
                                    <button class="btn btn--radius-2 btn--blue" type="submit" name="Accueil">Retour à l'accueil</button>
                                <!-- Bouton deconnexion -->
                                    <button class="btn btn--radius-2 btn--blue" type="submit" name="Deconnexion">Deconnexion</button>
                                </div>
                            </form>
                            <div>
                                <?php
                                if ($erreur == 1) {
                                    echo '<div class="text-red">Un combattant ne peut pas se combattre lui-meme !</div>';
                                }
                                if ($erreur == 2) {
                                    echo '<div class="text-red">Le gagnant est forcement un des deux combattants !</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            highlight_string( file_get_contents($_SERVER['SCRIPT_FILENAME']));
            
            
            } catch (Exception  $error) {
                echo "error est : ".$error->getMessage();
            }
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