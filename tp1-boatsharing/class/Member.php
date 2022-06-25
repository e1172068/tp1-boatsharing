<?php
    require_once("./class/Crud.php");
    
    class Member {
        private $id;
        private $firstName;
        private $lastName;
        private $email;
        private $phone;

        public function __construct($id = null, $firstName, $lastName, $email, $phone) {
            $this->id = $id;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->phone = $phone;
        }

        /**
         * Retourne le nom complet du membre
         */
        public function getFullName() {
            return $this->firstName . " " . $this->lastName;
        }

        /**
         * Getter pour les propriétés de membre
         */
        public function get($p) {
            return $this->$p;
        }

        /**
         * Retourne le nombre de réservations faites par le membre.
         */
        public function countReservations() {
            $crud = new Crud;
            $id = $this->id;
            $sql = "SELECT COUNT(*) FROM member JOIN reservation ON member.id = reservation.member_id WHERE member.id = :$id";
            $query = $crud->prepare($sql);
            $query->bindValue(":$id", "$id");
            $query->execute();

            return $query->fetch();
        }
    }
?>