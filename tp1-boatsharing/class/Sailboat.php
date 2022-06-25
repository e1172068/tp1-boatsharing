<?php
    require_once("Crud.php");

    class Sailboat {
        private $id;
        private $name;
        private $typeId;
        
        public function __construct($id, $name, $typeId) {
            $this->id = $id;
            $this->name = $name;
            $this->typeId = $typeId;
        }

        /**
         * Getter pour les voiliers
         */
        public function get($p) {
            return $this->$p;
        }

        /**
         * Récupère les informations sur le type de bateau contenues dans la table "sailboat_type".
         */
        public function getTypeDetails() {
            $crud = new Crud;
            $select = $crud->selectById("sailboat_type", "id", $this->typeId);
            return $select;
        }
    }

?>