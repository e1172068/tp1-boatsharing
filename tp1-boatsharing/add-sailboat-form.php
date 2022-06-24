<?php
    require_once("./class/Crud.php");
    $crud = new Crud;
    $selectItems = $crud->select("sailboat_type");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un voilier</title>
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
            <form method="post" action="add-sailboat.php">
                <h1>Ajout d'un voilier</h1>
                <div>
                    <label for="name">Nom: </label>
                    <input type="text" id="name" name="name" maxlength="45">
                </div>
                <div>
                    <label for="sailboat_type_id">Type: </label>
                    <select name="sailboat_type_id" id="sailboat_type_id">
                    <?php
                        foreach ($selectItems as $selectItem) {
                            echo "<option value=" . $selectItem["id"] . ">" . $selectItem["name"] . "</option>";
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