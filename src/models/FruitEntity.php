<?php
namespace Models;

class FruitEntity
{
    protected $name;
    protected $price;

    public function __construct(array $data) {
        // no id if we're creating
        if(isset($data['name'])) {
            $this->name = $data['name'];
        }
        $this->price = $data['price'];
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }
}