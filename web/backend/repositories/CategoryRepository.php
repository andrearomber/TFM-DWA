<?php
require_once __DIR__ . '/../dao/components/CategoryDAO.php';
require_once __DIR__ . '/../Utils/ExceptionController.php';

class CategoryRepository {
    private $categoryDAO;

    public function __construct() {
        $this->categoryDAO = new CategoryDAO();
    }

    public function getAllCategories() {
        try {
            $result = $this->categoryDAO->getAllItems();
            return ExceptionController::return_message_JSON(true, "All Categories Selected", $result);
        } catch (Exception $e) {
            return ExceptionController::return_message_JSON(false, "Error selecting Categories: " . $e->getMessage(), false);
        }
    }

    public function getCategoryById($id) {
        try {
            $result = $this->categoryDAO->getItemById($id);
            return ExceptionController::return_message_JSON(true, "Category By Id " . $id . " selected", $result);
        } catch (Exception $e) {
            return ExceptionController::return_message_JSON(false, "Error selecting Category By ID: " . $e->getMessage(), false);
        }
    }

    public function createCategory($data) {
        try {
            $result = $this->categoryDAO->createItem($data);
            return ExceptionController::return_message_JSON(true, "Category created successfully", $result);
        } catch (Exception $e) {
            return ExceptionController::return_message_JSON(false, "Error inserting Category: " . $e->getMessage(), false);
        }
    }

    public function updateCategory($id, $data) {
        try {
            $result = $this->categoryDAO->updateItem($id, $data);
            return ExceptionController::return_message_JSON(true, "Category updated successfully", $result);
        } catch (Exception $e) {
            return ExceptionController::return_message_JSON(false, "Error updating Category: " . $e->getMessage(), false);
        }
    }

    public function deleteCategory($id) {
        try {
            $result = $this->categoryDAO->deleteItem($id);
            return ExceptionController::return_message_JSON(true, "Category deleted successfully", $result);
        } catch (Exception $e) {
            return ExceptionController::return_message_JSON(false, "Error deleting Category By Id " . $id . ": " . $e->getMessage(), false);
        }
    }
}
