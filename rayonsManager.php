<?php

    class RayonsManager
    {
        private $_db; // Instance de PDO

        public function __construct($db)
        {
            $this->setDb($db);
        }

        public function add(Rayon $rayon)
        {
            $q = $this->_db->prepare('INSERT INTO rayon (nom, reference) VALUES(:nom, :reference)');

            $q->bindValue(':nom', $rayon->nom());
            $q->bindValue(':reference', $rayon->reference(), PDO::PARAM_INT);

            $q->execute();
        }

        public function delete(Rayon $rayon)
        {
            $this->_db->exec('DELETE FROM rayon WHERE id = '.$rayon->id());
        }

        public function get($id)
        {
            $id = (int) $id;

            $q = $this->_db->query('SELECT id, nom, reference FROM rayon WHERE id = '.$id);
            $donnees = $q->fetch(PDO::FETCH_ASSOC);

            return new Rayon($donnees);
        }

        public function getList()
        {
            $rayons = [];

            $q = $this->_db->query('SELECT * FROM rayon ORDER BY nom');

            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
            $rayons[] = new Rayon($donnees);
            }

            return $rayons;
        }

        public function update(Rayon $rayon)
        {
            $q = $this->_db->prepare('UPDATE rayon SET nom = :nom, reference = :reference WHERE id = :id');

            $q->bindValue(':nom', $rayon->nom(), PDO::PARAM_INT);
            $q->bindValue(':reference', $rayon->reference(), PDO::PARAM_INT);
        

            $q->execute();
        }

        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }
    }

    $db = new PDO('mysql:host=localhost;dbname=biblio', 'root', '');

    $rayon = new RayonsManager($db);

?>