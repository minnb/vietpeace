<?php
namespace App\Utils;
class CompanyInfo 
{
  public $company;
  public $address;
  public $phone;
  public $fax;
  public $email;
  public $tax;
  public $contact;
  public $logo;
  public $slogan;
  public function set_company($company )
  {
      $this->company = $company;
  }
  public function set_address($address )
  {
      $this->address = $address;
  }
  public function set_phone($phone )
  {
      $this->phone = $phone;
  }
  public function set_cfax($fax )
  {
      $this->fax = $fax;
  }
  public function set_email($email )
  {
      $this->email = $email;
  }
  public function set_tax($tax )
  {
      $this->tax = $tax;
  }
  public function set_contact($contact )
  {
      $this->contact = $contact;
  }
  public function set_logo($logo )
  {
      $this->logo = $logo;
  }
  public function set_slogan($slogan )
  {
      $this->slogan = $slogan;
  }
}
