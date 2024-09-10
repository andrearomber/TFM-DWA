<?php
require_once __DIR__ . '/../dao/components/MovieDAO.php';
require_once __DIR__ . '/../Utils/ExceptionController.php';

class MovieRepository {
    private $movieDAO;

    public function __construct() {
        $this->movieDAO = new MovieDAO();
    }

    public function getAllMovies() {
        try {
            $result = $this->movieDAO->getAllItems();
            // var_dump($result);
            return ExceptionController::return_message_JSON(true, "All Movies Selected", $result);
        } catch (Exception $e) {
            return ExceptionController::return_message_JSON(false, "Error selecting Movies: " . $e->getMessage(), false);
        }
    }
}
?>