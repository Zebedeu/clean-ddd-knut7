<?php


namespace app\Domain\ValueObject;

use Exception;
use JsonSerializable;
use Ramsey\Uuid\Uuid;
use RuntimeException;

class UserId implements JsonSerializable
{
    private string $userId;

    public function __construct(string $userId)
    {

        try {
                
            $this->userId = Uuid::uuid6();

        }catch(Exception $e) {
                throw new RuntimeException('Contact ID out of range.');
        }


    }

    public function getId(): string
    {
        return $this->userId;
    }

    public function jsonSerialize(): int
    {
        return $this->userId;
    }

    public function __toString() : string
    {
        return (string)$this->userId;
    }
}