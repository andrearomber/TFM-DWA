<?php
class BookingModel {
    private $session_id;
    private $user_id;
    private $create_time;
    private $booking_status;
    private $num_attendees;

    public function __construct($session_id = null, $user_id = null, $create_time = '', $booking_status = '', $num_attendees = null) {
        $this->session_id = $session_id;
        $this->user_id = $user_id;
        $this->create_time = $create_time;    
        $this->booking_status = $booking_status;    
        $this->num_attendees = $num_attendees;  
    }

    public function toArray() {
        return get_object_vars($this);
    }

    public static function fromArray($data) {
        return new self(
            $data['session_id'] ?? null,
            $data['user_id'] ?? null,
            $data['create_time'] ?? '',
            $data['booking_status'] ?? '',
            $data['num_attendees'] ?? null
        );
    }
}
?>