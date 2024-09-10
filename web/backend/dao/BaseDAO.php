<?php
require_once 'InterfaceDAO.php';
require_once __DIR__ . '/../config/Database.php';

abstract class BaseDAO implements InterfaceDAO {
    protected $db;
    protected $table;

    public function __construct($table) {
        $this->db = Database::getInstance()->getConnection();
        $this->table = $table;
    }

    public function createItem($entity) {
        $columns = implode(", ", array_keys($entity));
        $values = implode(", ", array_map(function($value) {
            return ":" . $value;
        }, array_keys($entity)));

        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($values)";
        $stmt = $this->db->prepare($sql);

        foreach ($entity as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function getItemById($id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateItem($id, $data) {
        $set = implode(", ", array_map(function($key) {
            return "$key = :$key";
        }, array_keys($data)));

        $sql = "UPDATE {$this->table} SET $set WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->bindValue(":id", $id);
        return $stmt->execute();
    }

    public function deleteItem($id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getAllItems() {
        $stmt = $this->db->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
