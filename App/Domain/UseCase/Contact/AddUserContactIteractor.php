<?php

namespace app\Domain\UseCase\Contact;

use app\Domain\Entity\Contact;
use app\Domain\Repository\ContactCommandRepositoryInterface;
use app\Domain\ValueObject\Contact\Address;
use app\Domain\ValueObject\Contact\City;
use app\Domain\ValueObject\Contact\ContactId;
use app\Domain\ValueObject\Contact\Country;
use \RuntimeException;
use \Throwable;

class AddUserContactIteractor {

  private ContactCommandRepositoryInterface $contactRepo;

  public function __construct(ContactCommandRepositoryInterface $contactRepo)
  {
    $this->contactRepo = $contactRepo;
  }

  public function action( Address $address, Country $country, City $city): void {

      try {
             $this->contactRepo->addContact($address, $country, $city);
        } catch (Throwable $e) {
          throw new RuntimeException('Unable to User contact.'. $e);
      }
  }

}