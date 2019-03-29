<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Bootstrap Theme Company Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=ZCOOL+QingKe+HuangYou" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body class="bg-light" style="font-family: 'ZCOOL QingKe HuangYou', cursive; font-size: 18px;">

<div class="shadow-lg">
    <nav class="bg-naz border-bottom">
    <ul class="nav justify-content-end">
        <li class="nav-item">
        <a class="nav-link text-red" href="?ctrl=Accueil&mth=index">Accueil</a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-red" href="?ctrl=Accueil&mth=recherche">Recherche</a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-red" href="?ctrl=Accueil&mth=trajet">Trajet</a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-red" href="?ctrl=Accueil&mth=compte">Compte</a>
        </li>
    </ul>
    </nav>

    <header class="bg-naz text-white p-3">
                <img src="image/logo.png" onClick="window.location = '?ctrl=Accueil&mth=index'" style="width:100px; left:0; position:absolute">
                <h2 class="text-center">NAZZA CO-VOITURAGE</h2>
                <p class="text-center">Site</p>

    </header>
</div>