<?php
    require_once "class/Crud.php";
    $crud = new Crud;
    $insert = $crud->insert("member", $_POST);
    header("Location: member-list.php");
?>
