<?php
    require_once("./class/Crud.php");
    require_once("./class/Member.php");

    $crud = new Crud;
    $member = $crud->selectById("member", "id", "5");
    $mathieu = new Member($member["id"], $member["first_name"], $member["last_name"], $member["email"], $member["phone"]);
    var_dump($mathieu);
    var_dump($mathieu->countReservations());
?>
