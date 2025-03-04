<?php
class Chien {
    // Propriétés de la classe
    private $race;
    private $age;
    private $poids;

    // Constructeur pour initialiser les propriétés
    public function __construct($race, $age, $poids) {
        $this->race = $race;
        $this->age = $age;
        $this->poids = $poids;
    }

    // Méthode pour afficher les caractéristiques du chien
    public function afficherCaracteristiques() {
        echo "Race: " . $this->race . "\n";
        echo "Âge: " . $this->age . " ans\n";
        echo "Poids: " . $this->poids . " kg\n";
        echo "-----------------------------\n";
    }

    // Méthode pour faire vieillir le chien
    public function vieillir() {
        $this->age += 1;
    }

    // Méthode pour faire grossir le chien
    public function grossir($poidsAjoute) {
        $this->poids += $poidsAjoute;
    }

    // Méthode pour faire maigrir le chien
    public function maigrir($poidsPerdu) {
        $this->poids -= $poidsPerdu;
    }
}
?>
