<?php 

namespace app\Domain\Entity;

use app\Domain\ValueObject\Contact\Address;
use app\Domain\ValueObject\Contact\City;
use app\Domain\ValueObject\Contact\ContactId;
use app\Domain\ValueObject\Contact\Country;

class Contact {
  private ContactId $id;
  private Address $address;
  private Country $country;
  private City $city;

  public function __construct( ContactId $id, Address $address, Country $country, City $city)
  {
    $this->id = $id;
    $this->address = $address;
    $this->country = $country;
    $this->city = $city;
  }

  public function getAddress(): Address {
    return $this->address;
  }

  public function getCountry(): Country {
    return $this->country;
  }

  public function getCity(): City {
    return $this->city;
  }

  public function getId(): ContactId {
    return $this->id;
  }
}