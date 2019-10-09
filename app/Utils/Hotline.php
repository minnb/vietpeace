<?php
namespace App\Utils;
class Hotline 
{
  public $contact_name;
  public $phone;
  public function set_content($contact_name )
  {
      $this->contact_name = $contact_name;
  }
  public function set_content($phone )
  {
      $this->phone = $phone;
  }
}
