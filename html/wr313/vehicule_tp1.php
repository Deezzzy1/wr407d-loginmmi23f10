<?php
// Inclure la classe Vehicule
require 'Vehicule.php';

// Instanciation des deux véhicules
$vehicule1 = new Vehicule("RENAULT", 90, 15000);
$vehicule2 = new Vehicule("PEUGEOT", 110, 20000);

// Démarrer l'affichage HTML
echo "<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Caractéristiques des véhicules</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }
        .vehicule {
            border: 1px solid #ccc;
            background-color: #fff;
            padding: 15px;
            margin: 20px;
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

// Affichage des caractéristiques initiales
echo "<h1>Caractéristiques des véhicules</h1>";

echo "<div class='vehicule'>
        <h2>Véhicule 1 - RENAULT</h2>
        <div class='details'>";
$vehicule1->afficherCaracteristiques();
echo "</div>
      </div>";

echo "<div class='vehicule'>
        <h2>Véhicule 2 - PEUGEOT</h2>
        <div class='details'>";
$vehicule2->afficherCaracteristiques();
echo "</div>
      </div>";

// Modification de la puissance du vehicule1
$vehicule1->setPuissance(110);

// Déplacement des véhicules
$vehicule1->utiliser(3500);  // Le vehicule1 parcourt 3500 km
$vehicule2->utiliser(1500);  // Le vehicule2 parcourt 1500 km

// Affichage des caractéristiques après modifications
echo "<h1>Caractéristiques après modifications</h1>";

echo "<div class='vehicule'>
        <h2>Véhicule 1 - RENAULT (Modifié)</h2>
        <div class='details'>";
$vehicule1->afficherCaracteristiques();
echo "</div>
      </div>";

echo "<div class='vehicule'>
        <h2>Véhicule 2 - PEUGEOT (Modifié)</h2>
        <div class='details'>";
$vehicule2->afficherCaracteristiques();
echo "</div>
      </div>";

// Affichage du kilométrage final des deux véhicules
echo "<h2>Kilométrage après déplacement :</h2>";
echo "<p><span class='highlight'>Véhicule 1</span> : " . $vehicule1->getKilometrage() . " km</p>";
echo "<p><span class='highlight'>Véhicule 2</span> : " . $vehicule2->getKilometrage() . " km</p>";

echo "</body>
</html>";
?>
