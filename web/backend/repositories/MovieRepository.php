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

    public function getMovieById($id) {
        try {
            $result = $this->movieDAO->getItemById($id);
            return ExceptionController::return_message_JSON(true, "Movie By Id " . $id . " selected", $result);
        } catch (Exception $e) {
            return ExceptionController::return_message_JSON(false, "Error selecting Movie By ID: " . $e->getMessage(), false);
        }
    }

    public function createMovie($data) {
        try {
            $result = $this->movieDAO->createItem($data);
            return ExceptionController::return_message_JSON(true, "Movie created successfully", $result);
        } catch (Exception $e) {
            return ExceptionController::return_message_JSON(false, "Error inserting Movie: " . $e->getMessage(), false);
        }
    }

    public function updateMovie($id, $data) {
        try {
            $result = $this->movieDAO->updateItem($id, $data);
            return ExceptionController::return_message_JSON(true, "Movie updated successfully", $result);
        } catch (Exception $e) {
            return ExceptionController::return_message_JSON(false, "Error updating Movie: " . $e->getMessage(), false);
        }
    }

    public function deleteMovie($id) {
        try {
            $result = $this->movieDAO->deleteItem($id);
            return ExceptionController::return_message_JSON(true, "Movie deleted successfully", $result);
        } catch (Exception $e) {
            return ExceptionController::return_message_JSON(false, "Error deleting Movie By Id " . $id . ": " . $e->getMessage(), false);
        }
    }
}
