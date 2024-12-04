<?php
namespace Repository;

use App\Entity\Actor as ActorEntity;

class ActorRepository {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getByFirstName($firstName) {
        $firstName = $this->db->real_escape_string($firstName);
    
        $query = "SELECT id, first_name, last_name, birth_date FROM cinema_actor WHERE first_name LIKE '%$firstName%'";
        $result = $this->db->query($query);
        $actors = [];

        while ($row = $result->fetch_array()) {
            $actor = new ActorEntity();
            $actor->setFirstName($row['first_name'])
                  ->setLastName($row['last_name'])
                  ->setBirthDate($row['birth_date']);
            $actors[] = $actor;
        }

        return $actors;
    }
}