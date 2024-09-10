<?php
class SessionModel {
    private $movie_id;
    private $start_time;
    private $end_time;
    private $date;
    private $price;
    private $special_event;
    private $capacity;

    public function __construct($movie_id = null, $start_time = '', $end_time = '', $date = '', $price = null, $special_event = '', $capacity = null) {
        $this->movie_id = $movie_id;
        $this->start_time = $start_time;
        $this->end_time = $end_time;    
        $this->date = $date;    
        $this->price = $price;    
        $this->special_event = $special_event;    
        $this->capacity = $capacity;  
    }

    public function toArray() {
        return get_object_vars($this);
    }

    public static function fromArray($data) {
        return new self(
            $data['movie_id'] ?? null,
            $data['start_time'] ?? '',
            $data['end_time'] ?? '',
            $data['date'] ?? '',
            $data['price'] ?? null,
            $data['special_event'] ?? '',
            $data['capacity'] ?? null
        );
    }
}
?>