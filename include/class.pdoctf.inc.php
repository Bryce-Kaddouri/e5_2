<?php
class PdoCtf
{
    /**
     * Propriétés privées de la classe PdoCtf pour les phases de tests
     */
    private static $serveur = 'mysql:host=localhost';
    private static $bdd = 'dbname=hackathon_v2';
    private static $user = 'root';
    private static $mdp = '12-Soleil&';
    private static $monPdo;
    private static $monPdoCtf = null;

    /**
     * Constructeur privé, crée l'instance de PDO qui sera sollicitée
     * pour toutes les méthodes de la classe
     */
    private function __construct()
    {
        PdoCtf::$monPdo = new PDO(PdoCtf::$serveur . ';' . PdoCtf::$bdd, PdoCtf::$user, PdoCtf::$mdp);
        PdoCtf::$monPdo->query("SET CHARACTER SET utf8");
    }

    public function __destruct()
    {
        PdoCtf::$monPdo = null;
    }

    /**
     * Fonction statique qui crée l'unique instance de la classe
     * Appel : $instancePdoCtf = PdoCtf::getPdoCtf();
     * @return l'unique objet de la classe PdoCtf
     */
    public static function getPdoCtf()
    {
        if (PdoCtf::$monPdoCtf == null) {
            PdoCtf::$monPdoCtf = new PdoCtf();
        }
        return PdoCtf::$monPdoCtf;
    }

    /**
     * Retourne les informations d'une équipe
     * @param $login
     * @param $mdp
     * @return l'id, le libelle et le login sous la forme d'un tableau associatif 
     */
    public function getInfosEquipe($login, $mdp)
    {
        $req = "SELECT equipeID, libelle, login  
                    FROM equipe 
                    WHERE login=:login AND motDePasse=SHA2(:mdp, 512);";
        $req = PdoCtf::$monPdo->prepare($req);
        $req->execute([':login' => $login, ':mdp' => $mdp]);
        $ligne = $req->fetch();
        return $ligne;
    }


    /**
     * Retourne les informations d'une enigme
     * @param $id
     * @return l'id, le libelle, le score, le flag et le type sous la forme d'un tableau associatif 
     */

    public function getLesEnigmes()
    {
        $req = "SELECT numero, libelle, url, categorie, thématique, contenu, nbPoints 
                    FROM challenge 
                    ORDER BY numero;";
        $req = PdoCtf::$monPdo->prepare($req);
        $req->execute();
        $lignes = $req->fetchAll();
        var_dump($lignes);
        die();

        // if (estResolu($lignes['numero'])) {
        //     $lignes['resolu'] = true;
        // } else {
        //     $lignes['resolu'] = false;
        // }

        return $lignes;
    }

    /**
     * Retourne vrai si l'équipe a déjà résolu l'énigme (idEnigme et idEquipe existe dans la table concerner)
     * @param $idChallenge, $idEquipe
     * @return vrai ou faux
     */
    public function estResolu($idChallenge, $idEquipe)
    {
        $req = "SELECT count(*) as total
                    FROM concerner 
                    WHERE numChallenge=:numChallenge AND idEquipe=:idEquipe AND numPartie=:numPartie;";
        $req = PdoCtf::$monPdo->prepare($req);
        $req->execute([':numChallenge' => $idChallenge, ':idEquipe' => $idEquipe]);

        // si la requête retourne une ligne, alors l'équipe a déjà résolu l'énigme
        $ligne = $req->fetch();
        if ($ligne['total'] == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getEnigmes()
    {
        // tout sauf le mot de passe et le flag
        $req = "SELECT numEnigme, libelle, url, niveau, thematique, contenu, nbPoints 
                    FROM enigme 
                    where numEnigme IN (SELECT noEnigme from concerner where noSession = 1) 
                    AND numEnigme NOT IN (SELECT noEnigme from validation where idEquipe = 1)
                    ORDER BY numEnigme;";
        $rs = PdoCtf::$monPdo->query($req);
        $lignes = $rs->fetchAll();
        return $lignes;
    }

    public function getEnigmesNonResolue()
    {
        // tout sauf le mot de passe et le flag
        $req = "SELECT numEnigme, libelle, url, niveau, thematique, contenu, nbPoints 
                    FROM enigme 
                    where numEnigme IN (SELECT noEnigme from concerner where noSession = 1) 
                    AND numEnigme IN (SELECT noEnigme from validation where idEquipe = 1)
                    ORDER BY numEnigme;";
        $rs = PdoCtf::$monPdo->query($req);
        $lignes = $rs->fetchAll();
        return $lignes;
    }

    public function getIdEquipe($login)
    {
        $req = "SELECT equipeID as id
                FROM equipe
                WHERE login=:login;";
        $req = PdoCtf::$monPdo->prepare($req);
        $req->execute([':login' => $login]);
        $ligne = $req->fetch();
        return $ligne['id'];
    }

    public function getUneEnigme($numChallenge)
    {
        $req = "SELECT numEnigme, libelle, url, niveau, thematique, contenu, nbPoints , difficulte
                FROM enigme 
                WHERE numEnigme=:numero;";
        $req = PdoCtf::$monPdo->prepare($req);
        $req->execute([':numero' => $numChallenge]);
        $ligne = $req->fetch();
        return $ligne;
    }

    public function getIdPartieByEquipe($idEquipe)
    {
        // recuperation de la session en cours avec la date la plus récente

        $req = "SELECT numero as numPartie
                FROM session
                WHERE idEquipe=:idEquipe;";
        $req = PdoCtf::$monPdo->prepare($req);
        $req->execute([':idEquipe' => $idEquipe]);
        $ligne = $req->fetch();
        return $ligne['numPartie'];
    }

    public function getNiveau(){
        $req = "SELECT  DISTINCT(difficulte), categorie.libelle, icone
        FROM enigme inner join categorie on numCateg = difficulte;";
        $rs = PdoCtf::$monPdo->query($req);
        $lignes = $rs->fetchAll();
        return $lignes;
    }

    public function writeLog($idEquipe, $action, $ip)
    {
       
        if(!preg_match("/^([0-9]{1,3}\.){3}[0-9]{1,3}$/", $ip)){
            return false;
        }
      

        // error_log('test');

        $sql = "call writeLogs(:idEquipe, :action, :ip);";
        // // echo "writeLogs(1, ".$action.", ".$ip.");";
        $req = PdoCtf::$monPdo->prepare($sql);
        $req->bindParam(':idEquipe', $idEquipe, PDO::PARAM_INT);
        $req->bindParam(':action', $action, PDO::PARAM_STR);
        $req->bindParam(':ip', $ip, PDO::PARAM_STR);
        $req->execute();
        

        return true;


    }
}
