<?php
// Inclure la classe Chien
require 'Chien.php';

// Démarrer l'affichage HTML
echo "<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Caractéristiques des chiens</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            padding: 20px;
        }
        .chien {
            border: 1px solid #ccc;
            background-color: #fff;
            padding: 15px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #007BFF;
        }
        .details {
            font-size: 16px;
            line-height: 1.6;
        }
        .highlight {
            font-weight: bold;
            color: #ff5722;
        }
    </style>
</head>
<body>";

// Instanciation des deux chiens
$chien1 = new Chien("Labrador", 4, 25);
$chien2 = new Chien("Berger Allemand", 6, 20);

// Affichage des caractéristiques initiales des chiens
echo "<h1>Caractéristiques initiales des chiens :</h1>";

echo "<div class='chien'>
        <h2>Chien 1 - Labrador</h2>";
$chien1->afficherCaracteristiques();
echo "</div>";

echo "<div class='chien'>
        <h2>Chien 2 - Berger Allemand</h2>";
$chien2->afficherCaracteristiques();
echo "</div>";

// Chien1 prend un an (anniversaire)
$chien1->vieillir();
echo "<h1>Après l'anniversaire de Chien 1 :</h1>";
echo "<div class='chien'>
        <h2>Chien 1 - Labrador</h2>";
$chien1->afficherCaracteristiques();
echo "</div>";

// Chien2 mange et prend 1,5 kg
$chien2->grossir(1.5);
echo "<h1>Après que Chien 2 a mangé :</h1>";
echo "<div class='chien'>
        <h2>Chien 2 - Berger Allemand</h2>";
$chien2->afficherCaracteristiques();
echo "</div>";

// Chien1 perd 2 kg
$chien1->maigrir(2);
echo "<h1>Après que Chien 1 a perdu 2 kg :</h1>";
echo "<div class='chien'>
        <h2>Chien 1 - Labrador</h2>";
$chien1->afficherCaracteristiques();
echo "</div>";

echo "</body>
</html>";
?>
