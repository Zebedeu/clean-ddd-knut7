<?php


namespace app\Domain\ValueObject;

use JsonSerializable;
use RuntimeException;

class Name implements JsonSerializable
{
    private string $name;

    public function __construct(string $name)
    {
        $validLength = strlen($name) < 20;
        if (!$validLength) {
            throw new RuntimeException(
                'Name cannot be longer than 20 characters.'
            );
        }

        $onlyValidChars = ctype_alnum(
                str_replace(' ', '', $name)
            ) === TRUE;
        if (!$onlyValidChars) {
            throw new RuntimeException(
                'Only alphanumeric characters are allowed on name.'
            );
        }

        $this->name = $name;
    }

    public function jsonSerialize(): string
    {
        return $this->name;
    }

    public function __toString() : string
    {
        return $this->name;
    }
}