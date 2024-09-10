<?php
class ActorModel {
    private $first_name;
    private $last_name;
    private $birth_year;

    public function __construct($first_name = '', $last_name = '', $birth_year = '') {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->birth_year = $birth_year;
    }

    public function toArray() {
        return get_object_vars($this);
    }

    public static function fromArray($data) {
        return new self(
            $data['first_name'] ?? '',
            $data['last_name'] ?? '',
            $data['birth_year'] ?? ''
        );
    }
}
?>