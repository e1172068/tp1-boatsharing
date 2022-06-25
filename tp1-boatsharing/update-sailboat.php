<?php 
    require_once "class/Crud.php";
    $crud = new Crud;
    $update = $crud->update("sailboat", $_POST, "id", $_POST["id"]);
    header("Location: sailboat-list.php");
?>