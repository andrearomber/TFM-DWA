<?php
require_once __DIR__ . '/../config/Database.php';

interface InterfaceDAO {
    public function createItem($data);
    public function getItemById($id);
    public function getAllItems();
    public function deleteItem($id);
    public function updateItem($id, $data);
}
?>