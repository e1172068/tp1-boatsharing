<?php
    require_once "class/Crud.php";
    $crud = new Crud;
    $sailboats = $crud->select("sailboat", "name", "ASC");
    $members = $crud->select("member", "first_name", "ASC");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'une réservation</title>
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
            <form method="post" action="add-reservation.php" class="reservation-form">
                <h1>Ajout d'une réservation</h1>
                <div>
                    <label for="start">Début de la réservation: </label>
                    <input type="datetime-local" id="start" name="start" min="1">
                </div>
                <div>
                    <label for="end">Fin de la réservation: </label>
                    <input type="datetime-local" id="end" name="end" min="1">
                </div>
                <div>
                    <label for="crew_size">Taille de l'équipage: </label>
                    <input type="number" id="crew_size" name="crew_size" min="1">
                </div>
                <div>
                    <label for="sailboat_id">Nom du voilier: </label>
                    <select name="sailboat_id" id="sailboat_id">
                    <?php
                        foreach ($sailboats as $sailboat) {
                            echo "<option value=" . $sailboat["id"] . ">" . $sailboat["name"] . "</option>";
                        }
                    ?>
                    </select>
                </div>
                <div>
                    <label for="member_id">Nom du membre: </label>
                    <select name="member_id" id="member_id">
                    <?php
                        foreach ($members as $member) {
                            echo "<option value=" . $member["id"] . ">" . $member["first_name"] . " " . $member["last_name"] . "</option>";
                        }
                    ?>
                    </select>
                </div>
                <div>
                    <input type="submit" value="Envoyer">
                </div>
            </form>
        </div>
    </div>
</body>
</html>