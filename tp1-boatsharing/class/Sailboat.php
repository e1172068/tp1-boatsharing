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

        public function get($p) {
            return $this->$p;
        }

        public function getTypeDetails() {
            $crud = new Crud;
            $select = $crud->selectById("sailboat_type", "id", $this->typeId);
            return $select;
        }
    }

?>