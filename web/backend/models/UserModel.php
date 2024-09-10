<?php
class UserModel {
    private $first_name;
    private $last_name;
    private $email;
    private $phone;
    private $role;

    public function __construct($first_name = '', $last_name = '', $email = '', $phone = '', $role = '') {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;    
        $this->phone = $phone;    
        $this->role = $role;    
    }

    public function toArray() {
        return get_object_vars($this);
    }

    public static function fromArray($data) {
        return new self(
            $data['first_name'] ?? '',
            $data['last_name'] ?? '',
            $data['email'] ?? '',
            $data['phone'] ?? '',
            $data['role'] ?? ''
        );
    }
}
?>