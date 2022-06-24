<?php

    class Crud extends PDO {
        public function __construct() {
            parent::__construct(    
                "mysql:host=localhost; dbname=tp1-boatsharing",
                "root", 
                ""
            );
        }


        public function insert($table, $data) {
            $champ = implode(", ", array_keys($data));
            $valeur = ":".implode(", :", array_keys($data));
            $sql = "INSERT INTO $table ($champ) VALUES ($valeur)";
            $query = $this->prepare($sql);

            foreach ($data as $key=>$value) {
                $query->bindValue(":$key", $value);
            }

            if (!$query->execute()) {
                print_r($query->errorInfo());
            } else {
                return $this->lastInsertId();
            }

            return $sql;
        }


        public function select($table, $orderby = null, $order = null) {
            if ($orderby == null) {
                $sql = "SELECT * FROM $table";
            } else {
                $sql = "SELECT * FROM $table ORDER BY $orderby $order";
            }

            $query = $this->query($sql);
            return $query->fetchAll();
        }


        public function update($table, $data, $column, $id) {
            $requestedUpdates = null;
            foreach ($data as $key=>$value) {
                $requestedUpdates .=$key."=:".$key.", ";
            }
            $requestedUpdates = rtrim($requestedUpdates, ", ");

            $sql = "UPDATE $table SET $requestedUpdates WHERE $column =:$column";

            $query = $this->prepare($sql);
            foreach ($data as $key=>$value) {
                $query->bindValue(":$key", $value);
            }

            if (!$query->execute()) {
                print_r($query->errorInfo());
            } else {
                return $id;
            }
        }


        public function delete($table, $id) {
            $sql = "DELETE FROM $table WHERE id = :$id";
            $query = $this->prepare($sql);
            $query->bindValue(":$id", "$id");
            $query->execute();
            
            if(!$query->execute()){
                print_r($query->errorInfo());
            }
        }


        public function selectById($table, $column, $id) {
            $sql = "SELECT * FROM $table WHERE $column = :$column";
            $query = $this->prepare($sql);
            $query->bindValue(":$column", $id);
            $query->execute();
            return $query->fetch();
        }
    }









































//         public function insert($table, $data) {
//             $nomChamp = implode(", ", array_keys($data));
//             $valeurChamp = ":".implode(", :", array_keys($data));

//             $sql = "INSERT INTO $table ($nomChamp) VALUES ($valeurChamp)";


//             $query = $this -> prepare($sql);

//             foreach($data as $key=>$value){
//                 $query->bindValue(":$key", $value);
//             }

//             if(!$query->execute()) {
//                 $query->errorInfo();
//             } else {
//                 return $this->lastInsertId();
//             }

//             return $sql;
//         }

//         public function select($table, $champOrdre = null, $ordre = null) {
//             if($champOrdre == null) {
//                 $sql = "SELECT * FROM $table";
//             } else {
//                 $sql = "SELECT * FROM $table ORDER BY $champOrdre $ordre";
//             }

//             $query = $this->query($sql);
//             return $query->fetchAll();
//         }

//         public function selectId($table, $champ, $id){
//             $sql = "SELECT * FROM $table WHERE $champ = :$champ";
//             $query = $this->prepare($sql);
//             $query->bindValue(":$champ", $id);
//             $query->execute();
//             return $query->fetch();
//         }

//         public function update($table, $data, $champ, $id) {
//             $champRequete = null;
//             foreach($data as $key=>$value){
//                 $champRequete .=$key."=:".$key.", ";
//             }

//             $champRequete = rtrim($champRequete, ", ");

//             $sql = "UPDATE $table SET $champRequete WHERE $champ = :$champ";

//             $query = $this->prepare($sql);
//             foreach($data as $key=>$value){
//                 $query->bindValue(":$key", $value);
//             }

//             if(!$query->execute()){
//                 print_r($query->errorInfo());
//             }else {
//                 return $id;
//             }
//         }


//         static public function delete($table, $id, $url) {
//             $sql = "DELETE FROM $table WHERE $id = :$id";
//             $query = $this->prepare($sql);
//             $query->bindValue(":$id", "$id");
//             $query->execute();
//             if(!$query->execute()){
//                 print_r($query->errorInfo());
//             }else {
//                 header('Location: ' . $url);
//             }
//         }
//     }

    


// ?>