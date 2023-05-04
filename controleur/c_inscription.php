<?php
/**
 * Application CTF Hackathon 2022
 * BTS SIO
 * Lycée de Bellepierre
 */
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'demandeInscription';
}
$action = $_REQUEST['action'];
switch ($action) {
    case 'demandeInscription': {
            include("vues/v_inscription.php");
            break;
        }
    case 'enregistrement': {
            if(!empty($_REQUEST['login']) AND !empty($_REQUEST['mdp'])) {
                
            }else{
                ajouterErreur("Login ou mot de passe incorrect");
                include("vues/v_erreurs.php");
                include("vues/v_connexion.php");
                break;
            }

            $login = $_REQUEST['login'];
            $mdp = $_REQUEST['mdp'];
            $equipe = $pdo->getInfosEquipe($login, $mdp);
            if (!is_array($equipe)) {
                ajouterErreur("Login ou mot de passe incorrect");
                include("vues/v_erreurs.php");
                include("vues/v_connexion.php");
                break;
            } else {
                $id = $equipe['id'];
                $nom = $equipe['login'];
                connecter($id, $nom);
                
                break;
            }
            break;
        }
    default: {
        include("vues/v_connexion.php");
        break;
    }
}
