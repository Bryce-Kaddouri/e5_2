<?php


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
            $ip = $_SERVER['REMOTE_ADDR'];
            if($ip == '::1'){
                $ip = '127.0.0.1';
            }

      
            if (!is_array($equipe)) {
                // ip de l'utilisateur
                $pdo->writeLog(0, 'Test de connexion : Connexion écouhée', $ip);
                ajouterErreur("Login ou mot de   passe incorrect");
                include("vues/v_erreurs.php");
                include("vues/v_connexion.php");
                break;
            } else {
                 
                $id = $equipe['equipeID'];
                $nom = $equipe['login'];
                connecter($id, $nom);
                $pdo->writeLog($id, 'Test de connexion : Connexion réussie', $ip);

                header('Location: index.php?uc=enigme&action=afficherEnigmes');
                break;
            }
            
        }
        case 'logout':{
            session_destroy();
            header('index.php?uc=connexion&action=demandeConnexion');

        }
    default: {
        include("vues/v_connexion.php");

            break;
        }
}
