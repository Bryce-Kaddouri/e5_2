<?php

/**
 * Application CTF Hackathon 2022
 * BTS SIO
 * Lycée de Bellepierre
 */
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'demandeConnexionAdmin';
}
$action = $_REQUEST['action'];
switch ($action) {
    case 'demandeConnexionAdmin': {
            include("vues/boff/v_prof.php");
            break;
        }
    case 'valideConnexion': {
            if (isset($_REQUEST['login'], $_REQUEST['mdp'])) {
                if (!empty($_REQUEST['login']) and !empty($_REQUEST['mdp'])) {
                    $login = addslashes($_REQUEST['login']);
                    $mdp = addslashes($_REQUEST['mdp']);
                }
            }

            $prof = $pdo->getInfosProfesseur($login, $mdp);
            if (!is_array($prof)) {
                ajouterErreur("Login ou mot de passe incorrect");
                include("vues/v_erreurs.php");
                include("vues/v_connexion.php");
                break;
            } else {
                $id = $prof['id'];
                $nom = $prof['login'];
                connecter($id, $nom);
                $_SESSION['idPartie'] = $pdo->getIdPartie();
                include("vues/boff/v_accueilProf.php");
                break;
            }
            break;
        }
    default: {
            include("vues/v_connexion.php");
            break;
        }
}
