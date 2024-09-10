<?php
class TicketModel {
    private $ticket_type;
    private $booking_id;
    private $ticket_price;
    private $token;

    public function __construct($ticket_type = null, $booking_id = null, $ticket_price = null, $token = '') {
        $this->ticket_type = $ticket_type;
        $this->booking_id = $booking_id;
        $this->ticket_price = $ticket_price;    
        $this->token = $token; 
    }

    public function toArray() {
        return get_object_vars($this);
    }

    public static function fromArray($data) {
        return new self(
            $data['ticket_type'] ?? null,
            $data['booking_id'] ?? null,
            $data['ticket_price'] ?? null,
            $data['token'] ?? ''
        );
    }
}
?>