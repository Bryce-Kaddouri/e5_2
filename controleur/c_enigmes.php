<?php

/**
 * Application CTF Hackathon 2022
 * BTS SIO
 * Lycée de Bellepierre
 */
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = '';
}
$action = $_REQUEST['action'];
switch ($action) {
    case 'afficherEnigmes': {

            // $idPartie = $pdo->
            include("vues/v_profile.php");
            $niveaux = $pdo->getNiveau();
            include("vues/v_difficulte.php");
            $idEquipe = $_SESSION['id'];
            $numSession = $_SESSION['numSession'];

            echo "test" .  $numSession;
            break;

            $enigmes = $pdo->getEnigmes($numSession, $idEquipe);
            $enigmesNonRes = $pdo->getEnigmesNonResolue();
            
            
            include("vues/v_enigmes.php");
            break;
        }
    case 'focusEnigme': {
            include("vues/v_profile.php");

            $numChallenge = $_REQUEST['numChallenge'];
            $idEquipe = $pdo->getIdEquipe($_SESSION['login']);
            $niveaux = $pdo->getNiveau();


            include("vues/v_difficulte.php");
            $idPartie = $pdo->getIdPartie($_SESSION['id']);
            $idPartie = 1;
            $enigme = $pdo->getUneEnigme($numChallenge);

            include("vues/v_focusEnigme.php");
            break;
        }

    default: {
            include("vues/v_connexion.php");
            break;
        }
}
