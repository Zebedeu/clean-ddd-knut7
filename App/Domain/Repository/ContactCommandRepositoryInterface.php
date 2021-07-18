<?php 


namespace app\Domain\Repository;

use app\Domain\Entity\Contact;
use app\Domain\ValueObject\Contact\Address;
use app\Domain\ValueObject\Contact\City;
use app\Domain\ValueObject\Contact\ContactId;
use app\Domain\ValueObject\Contact\Country;

interface ContactCommandRepositoryInterface {

  public function addContact( Address $address, Country $country, City $city) : void;

  public function removeContact( ContactId $id) : void;
  public function updateContact( Contact $id) : int;
}