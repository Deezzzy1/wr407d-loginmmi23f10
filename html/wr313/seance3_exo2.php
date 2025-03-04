<?php
//----------------------------------------------------
// fichier : seance3_exo2.php
// ---------------------------------------------------
// Notion d'encapsulation : protection des propriétés
// de l'objet.
// IUT de Troyes - MMI 2ème année
//----------------------------------------------------

require 'personne2.php';

// Nouvelle instance de la classe Personne2 avec un nom en minuscules
$etudiant = new Personne2('Martin', 'Paul', 19);

// Le nom sera automatiquement converti en majuscules
echo $etudiant->sePresente() . '<br>'; // Je m'appelle Paul MARTIN et j'ai 19 ans (nom en majuscules)

// Modification de l'attribut nom, en saisissant en minuscules
$etudiant->setNom('Durand'); // Le nom sera converti en majuscules
echo $etudiant->sePresente() . '<br>'; // Je m'appelle Paul DURAND et j'ai 19 ans (nom en majuscules)
?>
