<?php
    require_once "class/Crud.php";
    require_once "class/Member.php";

    $crud = new Crud;
    $members = $crud->select("member", "first_name", "ASC");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des membres</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <header class="header">
            <div class="wrapper">
                <div class="header__nav">
                    <div class="header__logo">
                        <h1><a href="index.php">Boatsharing</a></h1>
                    </div>
                    <nav class="header__menu">
                        <ul>
                            <li><a href="./member-list.php">Liste des membres</a></li>
                            <li><a href="./sailboat-list.php">Liste des voiliers</a></li>
                            <li><a href="./add-reservation-form.php">Faire une réservation</a></li>
                        </ul>
                    </nav>
                </div>
            </div>    
    </header>
    <div class="wrapper">
        <section class="section">
            <h1>Liste des membres</h1>
            <table>
                <thead>
                    <tr>
                        <th>Nom complet</th>
                        <th>Courriel</th>
                        <th>Téléphone</th>
                        <th>Nombre de réservations</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($members as $row) {
                            $member = new Member($row["id"], $row["first_name"], $row["last_name"], $row["email"], $row["phone"]);
                    ?>
                        <tr>
                            <td><?= $member->getFullName(); ?></a></td>
                            <td><?= $member->get("email"); ?></td>
                            <td><?= $member->get("phone"); ?></td>
                            <td><?= $member->countReservations()[0]; ?></td>
                            <td><a href="update-member-form.php?id=<?= $row["id"]?>">Modifier</a></td>
                            
                            <td><a href="delete-member.php?id=<?= $row["id"]?>">Supprimer</a></td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <a href="add-member-form.php">Ajouter un membre</a>
        </section>
    </div>
</body>
</html>