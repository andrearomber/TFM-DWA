<?php
class TicketTypeModel {
    private $ticket_name;
    private $discount;
    private $promotion;

    public function __construct($ticket_name = '', $discount = null, $promotion = '') {
        $this->ticket_name = $ticket_name;
        $this->discount = $discount;
        $this->promotion = $promotion;
    }

    public function toArray() {
        return get_object_vars($this);
    }

    public static function fromArray($data) {
        return new self(
            $data['ticket_name'] ?? '',
            $data['discount'] ?? null,
            $data['promotion'] ?? ''
        );
    }
}
?>