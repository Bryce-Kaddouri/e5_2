<?php

/**
 * Application CTF Hackathon 2022
 * BTS SIO
 * Lycée de Bellepierre
 */
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch ($action) {
    case 'demandeConnexion': {
            include("vues/v_connexion.php");
            break;
        }
    case 'valideConnexion': {
            if (isset($_REQUEST['login'], $_REQUEST['mdp'])) {
                if (!empty($_REQUEST['login']) and !empty($_REQUEST['mdp'])) {
                    $login = addslashes($_REQUEST['login']);
                    $mdp = addslashes($_REQUEST['mdp']);
                    
                }
            }

            $equipe = $pdo->getInfosEquipe($login, $mdp);
            echo $equipe;
        ;
            if (!is_array($equipe)) {
                ajouterErreur("Login ou mot de   passe incorrect");
                include("vues/v_erreurs.php");
                include("vues/v_connexion.php");
                break;
            } else {
                $id = $equipe['equipeID'];
                $nom = $equipe['login'];
                connecter($id, $nom);
                // $_SESSION['idPartie'] = $pdo->getIdPartie();
                header('Location: index.php?uc=enigme&action=afficherEnigmes');
                break;
            }
            
        }
    default: {
            break;
        }
}
