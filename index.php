<?php
session_start();
  require_once("include/fct.inc.php");
  require_once("include/class.pdoctf.inc.php");
  include("vues/v_entete.php");

  $pdo = PdoCtf::getPdoCtf();
  $estConnecte = estConnecte();
  if (!isset($_REQUEST['uc']) || !$estConnecte) {
    $_REQUEST['uc'] = 'connexion';
  }
  $uc = $_REQUEST['uc'];
  switch ($uc) {
    case 'connexion': {
      include("controleur/c_connexion.php");
      break;
    }
    case 'enigme': {
      include("controleur/c_enigmes.php");
      break;
    }
    case 'connexionProf':{
      include("controleur/c_connexionProf.php");
      break;
    }
    default: 
    

    
  }
  include("vues/v_pied.php");
?>
