<?php
require_once __DIR__ . '/../BaseDAO.php';

class MovieDAO extends BaseDAO {
    public function __construct() {
        parent::__construct('movies');
    }

    // Métodos específicos para MovieDAO pueden ir aquí
}
