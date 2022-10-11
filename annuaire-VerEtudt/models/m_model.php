<?php
/**
 * Created by PhpStorm.
 * User: christophe
 * Date: 18/10/2018
 * Time: 14:55
 */

class PdoBridge
{
    private static $serveur = 'mysql:host=localhost';
    private static $bdd = 'dbname=annuaire';
    private static $user = 'root';
    private static $mdp = 'root';
    private static $monPdoBridge = null;
    /**
     * @var PDO  
     */
    private static $monPdo;

    
    private function __construct()
    {
        PdoBridge::$monPdo = new PDO(PdoBridge::$serveur . ';' . PdoBridge::$bdd, PdoBridge::$user, PdoBridge::$mdp);
        PdoBridge::$monPdo->query("SET CHARACTER SET utf8");
    }

    public function _destruct()
    {
        PdoBridge::$monPdo = null;
    }

  
    public static function getPdoBridge()
    {
        if (PdoBridge::$monPdoBridge == null) {
            PdoBridge::$monPdoBridge = new PdoBridge();
        }
        return PdoBridge::$monPdoBridge;
    }
    public function getLesMembres()
    {
        $sql = 'select id,nom,prenom
        from membres';
        $req = PdoBridge::$monPdo->prepare($sql);
        $req->execute();
        $d = $req->fetchALL(PDO::FETCH_ASSOC);
        return $d;
    }
    public function getMaxId()
    {
        // modifiez la requête sql
        $req = "SELECT max(id) AS maxi FROM membres";
        $res = PdoBridge::$monPdo->query($req);
        $lesLignes = $res->fetch();
        return 1 + intval($lesLignes["maxi"]);
    }

   
   public function setLesMembres($nom, $prenom)
    {
        try{
            $id = $this->getMaxId();
         $sql = "INSERT INTO membres VALUES (:id,:nom,:prenom)";
         $query = PdoBridge::$monPdo->prepare($sql);    
         $query->bindValue(':id', $id, PDO::PARAM_INT);   
         $query->bindValue(':nom', $nom, PDO::PARAM_STR);
         $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
         $query->execute();

         return true;
        }
        catch (Exception $e) {
        return  "exception recus :". $e->getMessage(). "/n";
        }
        



    }

    public function deleteMembre($id)
    {
        try{
        
        $sql = "DELETE FROM `membres` WHERE id=:idMembre";
       
        $query = PdoBridge::$monPdo->prepare($sql);

       
        $query->bindValue(':idMembre', $id, PDO::PARAM_INT);
        $query->execute();
        } catch(Exception $e){
            echo $e->getMessage();
        }
       
    } 

    public function getInfoMembres()
    {
        
        $req = "SELECT * FROM membres";
        $rs = PdoBridge::$monPdo->query($req);
        $ligne = $rs->fetchAll();
        return $ligne;
    }
}