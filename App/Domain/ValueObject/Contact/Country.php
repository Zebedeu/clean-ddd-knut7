<?php

namespace app\Domain\ValueObject\Contact;

class Country {
  private string $country;

  public function __construct( $country) 
  {
    $this->country = $country;
  }

  public function getCountry() : string {
    return $this->country;
  }

  public function __toString() : string
  {
      return (string)$this->country;
  }
}