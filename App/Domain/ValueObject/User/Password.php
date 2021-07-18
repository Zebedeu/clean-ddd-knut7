<?php


namespace app\Domain\ValueObject\User;

use JsonSerializable;
use RuntimeException;

class Password implements JsonSerializable
{
    private string $password;

    public function __construct(string $password)
    {
        $validLength = strlen($password) < 20;
        if (!$validLength) {
            throw new RuntimeException(
                'password cannot be longer than 20 characters.'
            );
        }

        $onlyValidChars = ctype_alnum(
                str_replace(' ', '', $password)
            ) === TRUE;
        if (!$onlyValidChars) {
            throw new RuntimeException(
                'Only alphanumeric characters are allowed on password.'
            );
        }

        $this->password = $password;
    }

    public function jsonSerialize(): string
    {
        return $this->password;
    }

    public function __toString() : string
    {
        return $this->password;
    }
}