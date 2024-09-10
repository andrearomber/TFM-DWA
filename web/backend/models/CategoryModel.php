<?php
class MovieModel {
    private $name;

    public function __construct($name = '') {
        $this->name = $name;  
    }

    public function toArray() {
        return get_object_vars($this);
    }

    public static function fromArray($data) {
        return new self(
            $data['name'] ?? ''
        );
    }
}
?>