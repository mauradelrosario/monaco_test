<?php
namespace Models;

class Actor {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getByFirstName($firstName) {
        $firstName = $this->db->real_escape_string($firstName);
    
        $query = "SELECT 
        id,
        first_name,
        last_name,
        birth_date
    FROM cinema_actor
    WHERE first_name LIKE '%$firstName%'";

        $result = $this->db->query($query);
        $actors = [];

        while ($row = $result->fetch_array()) {
            $actors[] = $row;
        }

        return $actors;
    }
}