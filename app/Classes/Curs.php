<?php
namespace App\Classes;

class Curs {
    private $id;
    private $sigles;
    private $nom;
    private $siglesCicle;
    public function __construct($id, $sigles, $nom, $siglesCicle) {
        $this->id = $id;
        $this->sigles = $sigles;
        $this->nom = $nom;
        $this->siglesCicle = $siglesCicle;
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

    public function getSiglesCicle() {
        return $this->siglesCicle;
    }

    public function setSiglesCicle($siglesCicle) {
        $this->siglesCicle = $siglesCicle;
        return $this;
    }
}