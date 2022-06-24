<?php
    require_once "class/Crud.php";
    $crud = new Crud;
    $crud->delete("sailboat", $_GET["id"]);
    header("Location: sailboat-list.php");
?>