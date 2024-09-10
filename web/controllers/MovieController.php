<?php
require_once __DIR__ . '/../backend/repositories/MovieRepository.php';
require_once __DIR__ . '/../backend/Utils/DataArrays.php';

class MovieController {
    private $movieRepository;

    public function __construct() {
        $this->movieRepository = new MovieRepository();
    }

    public function listMovies() {
        $movies = $this->movieRepository->getAllMovies();
        require __DIR__ . '/../frontend/views/movies/list.php';
    }

    public function getMovie($id) {
        $movie = $this->movieRepository->getMovieById($id);
        require __DIR__ . '/../frontend/views/movies/list.php';
    }

    public function createMovie($data) {
        $movie_id = $this->movieRepository->createMovie($data);
        require __DIR__ . '/../frontend/views/movies/list.php';
    }

    public function updateMovie($id, $data) {
        $result = $this->movieRepository->updateMovie($id, $data);
        require __DIR__ . '/../frontend/views/movies/list.php';
    }

   public function deleteMovie($id) {
    $result = $this->movieRepository->deleteMovie($id);
    require __DIR__ . '/../frontend/views/movies/list.php';
   }
}

$movieController = new MovieController();
// $movieController->deleteMovie(16);
