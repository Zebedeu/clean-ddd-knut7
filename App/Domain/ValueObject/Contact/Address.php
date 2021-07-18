<?php

namespace app\Domain\ValueObject\Contact;

class Address {
  private string $address;

  public function __construct( $address) 
  {
    $this->address = $address;
  }

  public function getAddress() : string {
    return $this->address;
  }

  public function __toString() : string
  {
      return (string)$this->address;
  }
}