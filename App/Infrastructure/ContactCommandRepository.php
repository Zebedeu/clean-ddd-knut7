<?php

namespace app\Infrastructure;

use app\Domain\Entity\Contact;
use app\Domain\Repository\ContactCommandRepositoryInterface;
use app\Domain\ValueObject\Contact\ContactId;
use app\Domain\ValueObject\Contact\Address;
use app\Domain\ValueObject\Contact\Country;
use app\Domain\ValueObject\Contact\City;

class ContactCommandRepository implements ContactCommandRepositoryInterface {

  private $contact;
  private $objectContact;

  public function __construct(){
    $this->objectContact =  new ContactQueryRepository();
    $this->contact = $this->objectContact->getContacts(); 
   }

  public function addContact(Address $address, Country $country, City $city): void
  {
    $newUserId = 1;
    if (count($this->contact) > 0) {
        $newUserId = end($this->contact)["id"] + 1;
    }

    $contactData = ( new Contact( new ContactId($newUserId), $address, $country, $city ) );

    $data = [

      'id' => (string) $contactData->getId(),
      'address' => (string) $contactData->getAddress(),
     'country' => (string) $contactData->getCountry(),
     'city' => (string) $contactData->getCity()];

        $this->objectContact->saveContact($data);

    

  }

  public function removeContact(ContactId $id): void
  {
    
  }

  public function updateContact(Contact $id): int
  {
    return 1;
  }
}