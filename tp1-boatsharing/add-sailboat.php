<?php
    require_once "class/Crud.php";
    $crud = new Crud;
    $insert = $crud->insert("sailboat", $_POST);
    header("Location: sailboat-list.php");
?>
