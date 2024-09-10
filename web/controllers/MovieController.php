<?php
require_once __DIR__ . '/../backend/repositories/MovieRepository.php';

class MovieController {
    private $movieRepository;

    public function __construct() {
        $this->movieRepository = new MovieRepository();
    }

    public function listMovies() {
        $movies = $this->movieRepository->getAllMovies();
        require __DIR__ . '/../frontend/views/movies/list.php';
    }

    // Otros métodos...
}

$movieController = new MovieController();
$movieController->listMovies();
