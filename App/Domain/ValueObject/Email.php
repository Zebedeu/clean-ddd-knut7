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

        $onlyValidChars = ctype_alnum(
                str_replace(' ', '', $email)
            ) === TRUE;
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

    public function __toString()
    {
        return $this->email;
    }
}