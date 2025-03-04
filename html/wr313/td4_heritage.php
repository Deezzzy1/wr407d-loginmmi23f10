<?php
include('animal.php');

// Créer l’instance $chien1 de la classe Chien
$chien1 = new Chien('Chien', 2, 'Médor');

// Appeler la méthode seNomme()
echo $chien1->seNomme();

// Appeler la méthode mange()
$chien1->mange('viande');
$chien1->mange('croquettes');

// Afficher le régime alimentaire
echo $chien1->lire_regime();

// Afficher les informations du chien
echo $chien1->lire_informations();
?>
