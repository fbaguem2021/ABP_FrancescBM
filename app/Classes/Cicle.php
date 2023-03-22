<?php
namespace App\Classes;
class Cicle {
    private $id;
    private $sigles;
    private $nom;
    public function __construct(int $id, string $sigles, string $nom) {
        $this->id = $id;
        $this->sigles = $sigles;
        $this->nom = $nom;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getSigles() {
        return $this->sigles;
    }

    public function setSigles($sigles) {
        $this->sigles = $sigles;
        return $this;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
        return $this;
    }
}