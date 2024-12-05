<?php
namespace App\Repository;

use App\Entity\Cinema as CinemaEntity;

class CinemaRepository {
    private \mysqli $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll(): array {
        $query = "SELECT * FROM cinema_cinema";
        $result = $this->db->query($query);

        if (!$result) {
            throw new \Exception("Erreur : " . $this->db->error);
        }

        $cinemas = [];
        while ($row = $result->fetch_assoc()) {
            $cinema = new CinemaEntity();
            $cinema->setName($row['name'])
                ->setCity($row['city'])
                ->setNumberStreet($row['number_street'])
                ->setCodePost($row['code_post'])
                ->setOperatorId($row['operator_id']);
            $cinemas[] = $cinema->jsonSerialize();
        }

        return $cinemas;
    }
}