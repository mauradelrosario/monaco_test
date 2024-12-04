<?php
namespace Controller;

use Repository\CinemaRepository;
use Views\JsonView;

class CinemaController {
    private $cinemaModel;
    private $view;

    public function __construct($db) {
        $this->cinemaModel = new CinemaRepository($db);
        $this->view = new JsonView();
    }

    public function getCinemas() {
        return $this->cinemaModel->getAll();
    }
}