<?php
require_once __DIR__ . '/../BaseDAO.php';

class ActorDAO extends BaseDAO {
    public function __construct() {
        parent::__construct('actors');
    }

    public function getItemById($id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE actor_id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateItem($id, $data) {
        $set = implode(", ", array_map(function($key) {
            return "$key = :$key";
        }, array_keys($data)));

        $sql = "UPDATE {$this->table} SET $set WHERE actor_id = :id";
        $stmt = $this->db->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->bindValue(":id", $id);
        return $stmt->execute();
    }

    public function deleteItem($id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE actor_id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
