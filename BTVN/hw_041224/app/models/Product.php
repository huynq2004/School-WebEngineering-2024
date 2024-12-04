<?php

class Product {
    //Các thuộc tính (thành phần) của tin tức
    private $id;
    private $name;
    private $price;
    private $image;

    //constructer 1 bản tin với các thuộc tính
    public function __construct($id, $name, $price, $image) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
    }

    //Getter để lớp khác truy cập thông tin (do các thuộc tính bản tin có pvi truy xuất là private = không thể truy cập từ ngoài)
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getPrice() { return $this->price; }
    public function getImage() { return $this->image; }

    //Setter
    public function setName($name) {  $this->name = $name; }
    public function setPrice($price) { $this->price = $price; }
    public function setImage($image) { $this->image = $image; }

}