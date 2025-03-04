<?php
class Vehicule {
    // Propriétés de la classe
    private $marque;
    private $puissance;
    private $kilometrage;

    // Constructeur pour initialiser les propriétés
    public function __construct($marque, $puissance, $kilometrage) {
        $this->marque = $marque;
        $this->puissance = $puissance;
        $this->kilometrage = $kilometrage;
    }

    // Méthode pour afficher les caractéristiques du véhicule
    public function afficherCaracteristiques() {
        echo "Marque: " . $this->marque . "\n";
        echo "Puissance: " . $this->puissance . " CV\n";
        echo "Kilométrage: " . $this->kilometrage . " km\n";
        echo "-----------------------------\n";
    }

    // Méthode pour changer la puissance
    public function setPuissance($nouvellePuissance) {
        $this->puissance = $nouvellePuissance;
    }

    // Méthode pour simuler un déplacement (ajouter au kilométrage)
    public function utiliser($distance) {
        $this->kilometrage += $distance;
    }

    // Méthode pour obtenir le kilométrage
    public function getKilometrage() {
        return $this->kilometrage;
    }
}
?>
