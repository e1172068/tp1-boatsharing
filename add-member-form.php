<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un membre</title>
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
            <form method="post" action="add-member.php">
                <h1>Ajout d'un membre</h1>
                    <div>
                        <label for="first_name">Prénom: </label>
                        <input type="text" id="first_name" name="first_name" maxlength="20">
                    </div>
                    <div>
                        <label for="last_name">Nom: </label>
                        <input type="text" id="last_name" name="last_name" maxlength="20">
                    </div>
                    <div>
                        <label for="email">Courriel: </label>
                        <input type="email" id="email" name="email" maxlength="40">
                    </div>
                    <div>
                        <label for="phone">Téléphone: </label>
                        <input type="text" id="phone" name="phone" maxlength="30">
                    </div>
                    <div>
                        <input type="submit" value="Envoyer">
                    </div>
                </form>
        </div>
    </div>
</body>
</html>