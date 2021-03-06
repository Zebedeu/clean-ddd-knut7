<?php


namespace app\Domain\Entity;

use app\Domain\ValueObject\User\UserId;
use app\Domain\ValueObject\User\Email;
use app\Domain\ValueObject\User\Name;
use app\Domain\ValueObject\User\Password;

class User {
		private UserId $id;
		private Name $name;
        private Email $email;
        private Password $password;

	public function  __construct(  
		 UserId $id,
		 Name $name,
         Email $email,
         Password $password ) {
		

   		$this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;

    }

    public function getId(): UserId
    {
        return $this->id;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPassword(): Password
    {
        return $this->password;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password
        ];
    }

    // Determine whether the sentiment of text is positive
    // Use a web servic
}