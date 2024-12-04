<?php
namespace Controller;

use Repository\ActorRepository;
use Views\JsonView;

class ActorController {
    private $actorModel;
    private $view;

    public function __construct($db) {
        $this->actorModel = new ActorRepository($db);
        $this->view = new JsonView();
    }

    public function getActors() {
        $firstName = $_GET['first_name'] ?? '';
        $actors = $this->actorModel->getByFirstName($firstName);
        $this->view->render($actors);
    }

    public function createSession($cinemaId, $movieId) {
        // Logic for creating a session
    }
}