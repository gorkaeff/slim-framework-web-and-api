<?php
namespace Models;

class FruitEntity
{
    public $id;
    public $name;
    public $price;

    public function __construct(array $data) {
        if(isset($data['id'])) {
            $this->id = $data['id'];
        }
        $this->name = $data['name'];
        $this->price = $data['price'];
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }
}