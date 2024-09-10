<?php
class MovieModel {
    private $category_id;
    private $title;
    private $synopsis;
    private $release_year;
    private $duration_min;
    private $rating;
    private $audience;
    private $url_trailer;

    public function __construct($category_id = null, $title = '', $synopsis = '', $release_year = '', $duration_min = null, $rating = null, $audience = '', $url_trailer = '') {
        $this->category_id = $category_id;
        $this->title = $title;
        $this->synopsis = $synopsis;    
        $this->release_year = $release_year;    
        $this->duration_min = $duration_min;    
        $this->rating = $rating;    
        $this->audience = $audience;
        $this->url_trailer = $url_trailer;    
    }

    public function toArray() {
        return get_object_vars($this);
    }

    public static function fromArray($data) {
        return new self(
            $data['category_id'] ?? null,
            $data['title'] ?? '',
            $data['synopsis'] ?? '',
            $data['release_year'] ?? '',
            $data['duration_min'] ?? null,
            $data['rating'] ?? null,
            $data['audience'] ?? '',
            $data['url_trailer'] ?? ''
        );
    }
}
?>