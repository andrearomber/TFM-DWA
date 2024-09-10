<?php
require_once __DIR__ . '/../backend/repositories/CategoryRepository.php';
require_once __DIR__ . '/../backend/Utils/DataArrays.php';

class CategoryController {
    private $categoryRepository;

    public function __construct() {
        $this->categoryRepository = new categoryRepository();
    }

    public function listCategories() {
        $categories = $this->categoryRepository->getAllCategories();
        require __DIR__ . '/../frontend/views/categories/list.php';
    }

    public function getCategory($id) {
        $movie = $this->categoryRepository->getCategoryById($id);
        require __DIR__ . '/../frontend/views/categories/list.php';
    }

    public function createCategory($data) {
        $movie_id = $this->categoryRepository->createCategory($data);
        require __DIR__ . '/../frontend/views/categories/list.php';
    }

    public function updateCategory($id, $data) {
        $result = $this->categoryRepository->updateCategory($id, $data);
        require __DIR__ . '/../frontend/views/categories/list.php';
    }

   public function deleteCategory($id) {
    $result = $this->categoryRepository->deleteCategory($id);
    require __DIR__ . '/../frontend/views/categories/list.php';
   }
}

$movieController = new MovieController();
// $movieController->deleteMovie(16);
