<?php

namespace app\Domain\ValueObject\Contact;

class City {
  private string $city;

  public function __construct( $city) 
  {
    $this->city = $city;
  }

  public function getCity() : string {
    return $this->city;
  }

  public function __toString() : string
  {
      return (string)$this->city;
  }
}