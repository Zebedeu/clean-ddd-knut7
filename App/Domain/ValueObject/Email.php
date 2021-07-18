<?php


namespace app\Domain\ValueObject;

use JsonSerializable;
use RuntimeException;

class Email implements JsonSerializable
{
    private string $email;

    public function __construct(string $email)
    {
        $validLength = strlen($email) < 200;
        if (!$validLength) {
            throw new RuntimeException(
                'email cannot be longer than 20 characters.'
            );
        }

        $onlyValidChars = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$onlyValidChars) {
            throw new RuntimeException(
                'Only alphanumeric characters are allowed on email.'
            );
        }

        $this->email = $email;
    }

    public function jsonSerialize(): string
    {
        return $this->email;
    }

    public function __toString() : string
    {
        return $this->email;
    }
}