<?php
namespace App\Utils;
class ShoppingCart 
{
  public $id;
  public $name;
  public $price;
  public $quantity;
  public $attributes;

  public function set_id($id_ )
  {
      $this->id = $id_;
  }
  public function set_name($name )
  {
      $this->name = $name;
  }
  public function set_price($price )
  {
      $this->price = $price;
  }
  public function set_quantity($quantity )
  {
      $this->quantity = $quantity;
  }
  public function set_attributes($attributes = [])
  {
      $this->attributes = $attributes;
  }
}
