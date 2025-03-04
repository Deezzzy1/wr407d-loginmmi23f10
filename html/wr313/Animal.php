<?php
// Classe Animal
class Animal {
    // Propriétés
    protected string $nom;
    protected int $age;
    protected int $age_maximum;
    protected array $regime_alimentaire;
    protected string $etat; // 'mort' ou 'vivant'

    // Constructeur
    public function __construct($nom, $age, $age_maximum) {
        $this->nom = $nom;
        $this->age = $age;
        $this->age_maximum = $age_maximum;
        $this->regime_alimentaire = [];
        $this->etat = 'vivant';
    }

    // Méthode pour lire les informations de l'animal
    public function lire_informations(): string {
        return "Nom: {$this->nom}, Âge: {$this->age} ans, État: {$this->etat} <br>";
    }

    // Méthode pour ajouter un aliment au régime alimentaire
    public function mange($aliment): void {
        if ($this->etat === 'vivant') {
            $this->regime_alimentaire[] = $aliment;
        } else {
            echo "{$this->nom} est mort et ne peut plus manger. <br>";
        }
    }

    // Méthode pour vieillir l'animal
    public function vieillir($nbannees): void {
        if ($this->etat === 'vivant') {
            $this->age += $nbannees;
            if ($this->age > $this->age_maximum) {
                $this->etat = 'mort';
            }
        }
    }

    // Méthode pour lire le régime alimentaire
    public function lire_regime(): string {
        return "Régime alimentaire de {$this->nom}: " . implode(', ', $this->regime_alimentaire) . "<br>";
    }
}

// Classe Chien qui hérite de Animal
class Chien extends Animal {
    // Propriété spécifique
    private string $nom_familier;

    // Constructeur
    public function __construct($nom, $age, $nom_familier) {
        // On fixe l'âge théorique maximum à 18 ans pour tous les chiens
        parent::__construct($nom, $age, 18);
        $this->nom_familier = $nom_familier;
    }


    // Méthode seNomme
    public function seNomme(): string {
        return "Nom familier: {$this->nom_familier} <br>";
    }

    // Surcharge de la méthode lire_informations()
    public function lire_informations(): string {
        return parent::lire_informations() . "Nom familier: {$this->nom_familier} <br>";
    }
}
?>
