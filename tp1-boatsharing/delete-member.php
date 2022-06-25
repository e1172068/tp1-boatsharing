<?php
    require_once "class/Crud.php";
    $crud = new Crud;
    $crud->delete("member", $_GET["id"]);
    header("Location: member-list.php");
?>