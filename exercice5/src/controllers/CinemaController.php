<?php
namespace Controllers;

use Models\Cinema;
use Models\Actor;
use Views\JsonView;

class CinemaController {
    private $cinemaModel;
    private $actorModel;
    private $view;

    public function __construct($db) {
        $this->cinemaModel = new Cinema($db);
        $this->actorModel = new Actor($db);
        $this->view = new JsonView();
    }

    public function getCinemas() {
        $cinemas = $this->cinemaModel->getAll();
        $this->view->render($cinemas);
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