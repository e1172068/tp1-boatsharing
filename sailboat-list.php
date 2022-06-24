<?php
    require_once "class/Crud.php";
    require_once "class/Sailboat.php";

    $crud = new Crud;
    $sailboats = $crud->select("sailboat", "name", "ASC");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des voiliers</title>
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
            <h1>Liste des voiliers</h1>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Type</th>
                        <th>Minimum d'équipiers</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($sailboats as $row) {
                            $sailboat = new Sailboat($row["id"], $row["name"], $row["sailboat_type_id"]);
                            $type = $sailboat->getTypeDetails();
                    ?>
                        <tr>
                            <td><?= $sailboat->get("name") ?></a></td>
                            <td><?= $type["name"] ?></td>
                            <td><?= $type["min_crew_size"] ?></td>
                            <td><a href="update-sailboat-form.php?id=<?= $row["id"]?>">Modifier</a></td>
                            <td><a href="delete-sailboat.php?id=<?= $row["id"]?>">Supprimer</a></td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <a href="add-sailboat-form.php">Ajouter un voilier</a>
        </div>
    </div>
</body>
</html>