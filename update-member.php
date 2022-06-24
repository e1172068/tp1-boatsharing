<?php 
    require_once "class/Crud.php";
    $crud = new Crud;
    $update = $crud->update("member", $_POST, "id", $_POST["id"]);
    header("Location: member-list.php");
?>