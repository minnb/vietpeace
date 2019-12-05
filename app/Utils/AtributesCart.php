<?php
namespace App\Utils;
class AtributesCart 
{
  public $date;
  public $adults;
  public $children;

  public function set_date($date )
  {
      $this->date = $date;
  }
  public function set_adults($adults )
  {
      $this->adults = $adults;
  }
  public function set_children($children )
  {
      $this->children = $children;
  }
}
