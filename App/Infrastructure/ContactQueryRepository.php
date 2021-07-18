<?php

namespace app\Infrastructure;

use app\Domain\Repository\ContactQueryRepositoryInterface;

class ContactQueryRepository implements ContactQueryRepositoryInterface {

  private UserRepository $contact;
    
  public function __construct( ) {
      $this->contact = new UserRepository(  new \Ballybran\Database\Drives\AbstractDatabasePDO(
          [
              'dns' => DB_TYPE . ':host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME ,
              'users' => DB_USER ,
              'pass' => DB_PASS
      
          ]
      ));
  }

  public function saveContact( $data)  {

    return $this->contact->saveContact($data, null);
}
  public function getContacts() : array {
    return $this->contact->getContacts();
  }
}