<?php
namespace Repository;

use App\Entity\Cinema as CinemaEntity;

class CinemaRepository {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $query = "SELECT id, name, city, number_street, code_post, operator_id FROM cinema_cinema";
        $result = $this->db->query($query);
        $cinemas = [];

        while ($row = $result->fetch_array()) {
            $cinema = new CinemaEntity();
            $cinema->setName($row['name'])
                  ->setCity($row['city'])
                  ->setNumberStreet($row['number_street'])
                  ->setCodePost($row['code_post'])
                  ->setOperatorId($row['operator_id']);
            $cinemas[] = $cinema;
        }

        return $cinemas;
    }
}