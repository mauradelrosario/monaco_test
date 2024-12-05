<?php
namespace App\Controller;

use App\Repository\ActorRepository;

class ActorController {
    private $actorModel;
    public function __construct($db) {
        $this->actorModel = new ActorRepository($db);
    }

    public function getActors():array {
        $firstName = $_GET['first_name'] ?? '';
        return $this->actorModel->getByFirstName($firstName);
    }

}