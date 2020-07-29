<html>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Velvet Records</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-light bg-dark mb-2">
    <a class="navbar-brand text-light" href="../index.php">Velvet Records</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active text-light" href="../index.php">Liste <span class="sr-only">(current)</span></a>
            <?php
            if (isset($_SESSION["login"]) && !empty($_SESSION["login"])) {
                ?>
                <a class="nav-item nav-link text-light text-left"
                   href="../script/logout_script.php">Déconnexion</a>
                <?php
            } else {
                ?>
                <a class="nav-item nav-link text-light text-left"
                   href="sub_form.php">Inscription</a>
                <a class="nav-item nav-link text-light text-left"
                   href="login_form.php">Connexion</a>
                <?php
            }
            ?>
        </div>
    </div>
</nav>

