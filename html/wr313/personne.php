<?php
class Personne {
    // Définition des attributs de la classe
    private string $prenom;
    private string $nom;
    private int $age;

    // Définition de la fonction constructeur
    public function __construct($n, $p, $a) {
        $this->nom = $n;
        $this->prenom = $p;
        $this->age = $a;
    }

    // Getter pour le nom
    public function getNom(): string {
        return $this->nom;
    }

    // Setter pour le nom
    public function setNom(string $nouveauNom): void {
        $this->nom = $nouveauNom;
    }

    // Définition du comportement sePresente()
    public function sePresente(): string {
        return 'Je m\'appelle ' . $this->prenom . ' ' . $this->nom . ' et j\'ai ' . $this->age . ' ans';
    }
}
?>
