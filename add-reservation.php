<?php
    require_once "class/Crud.php";
    $crud = new Crud;
    $insert = $crud->insert("reservation", $_POST);
    header("Location: member-list.php");
?>
