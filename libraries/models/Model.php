<?php 

namespace Models;

require_once('libraries/database.php');

abstract class Model {
    protected $pdo;
    protected $table;

    public function __construct() {
        $this->pdo = getPdo();
    }
    
    /**
     * Retourne la liste des items classés par date de création
     *
     * @param integer $id
     * @return void
     */
    public function find(int $id) {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");

        // On exécute la requête en précisant le paramètre :id 
        $query->execute(['id' => $id]);

        // On fouille le résultat pour en extraire les données réelles de l'item
        $item = $query->fetch();

        return $item;
    }
    
    /**
     * Supprime un item dans la base grâce à son identifiant
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id) : void {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }
    
    /**
     * Retourne la liste des items classés par date de création
     *
     * @return array
     */
    public function findAll(?string $order = "") : array {
        $sql = "SELECT * FROM {$this->table}";

        if ($order) {
            $sql.= " ORDER BY " . $order;
        }
        
        $resultats = $this->pdo->query($sql);
        // On fouille le résultat pour en extraire les données réelles
        $items = $resultats->fetchAll();

        return $items;
    }

}

?>