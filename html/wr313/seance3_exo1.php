<?php
require 'personne.php';

// Nouvelle instance de class.Personne
$etudiant = new Personne('Martin', 'Paul', 19);
echo $etudiant->sePresente() . '<br>'; // Je m'appelle Paul Martin et j'ai 19 ans

// Modification de l'attribut nom avec le setter
$etudiant->setNom('Durand');
echo $etudiant->sePresente() . '<br>'; // Je m'appelle Paul Durand et j'ai 19 ans
?>
