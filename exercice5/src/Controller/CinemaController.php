<?php
namespace App\Controller;

use App\Repository\CinemaRepository;

class CinemaController {
    private CinemaRepository $cinemaRepository;

    public function __construct($db) {
        $this->cinemaRepository = new CinemaRepository($db);
    }

    /**
     * @throws \Exception
     */
    public function getCinemas(): array {
        return $this->cinemaRepository->getAll();
    }
}