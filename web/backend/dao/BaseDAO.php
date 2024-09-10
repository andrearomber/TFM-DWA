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

    public function createItem($data) {
        $columns = implode(", ", array_keys($data));
        $values = implode(", ", array_map(function($value) {
            return ":" . $value;
        }, array_keys($data)));

        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($values)";
        $stmt = $this->db->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function getAllItems() {
        $stmt = $this->db->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
