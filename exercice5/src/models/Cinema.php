<?php
namespace Models;

class Cinema {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $query = "SELECT 
        id,
        name,
        city,
        number_street,
        code_post,
        operator_id
    FROM cinema_cinema";

        $result = $this->db->query($query);
        $cinemas = [];

        while ($row = $result->fetch_array()) {
            $cinemas[] = $row;
        }

        return $cinemas;
    }
}