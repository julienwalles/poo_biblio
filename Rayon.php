<?php

class Rayon {

    private $_id;
    private $_nom;
    private $_reference;

    // public function __construct(array $donnees) {
     
    //     $this->hydrate($donnees);
    // }

    public function hydrate (array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key); // ucfirst() met une majuscule à la première lettre du premier mot
            if (method_exists($this, $method)) { // On vérifie que la méthode existe
                $this->$method($value);
            }
        }
    }

    //getters
    public function id() {
        return $this->_id;
    }

    public function nom() {
        return $this->_nom;
    }

    public function reference() {
        return $this->_reference;
    }

    //setters
    public function setId($id) {
        $this->_id = (int) $id;
    }

    public function setNom($nom) {
        if(is_string($nom) && strlen($nom) <=30) {

            $this->_nom = $nom;
        }

    }

    public function setReference($reference) {
        $this->_reference = (int) $reference;
    }
}

?>