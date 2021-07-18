<?php

namespace app\Domain\ValueObject\Contact;

class ContactId {
  private $contactId;

  public function __construct( $contactId) 
  {
    $this->contactId = $contactId;
  }

  public function getContactId() : string {
    return $this->contactId;
  }
  public function __toString() : string
  {
      return (string)$this->contactId;
  }
}