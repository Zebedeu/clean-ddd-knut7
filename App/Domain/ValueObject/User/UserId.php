<?php


namespace app\Domain\ValueObject\User;

use Exception;
use JsonSerializable;
use Ramsey\Uuid\Uuid;
use RuntimeException;

class UserId implements JsonSerializable
{
    private string $userId;

    public function __construct(string $userId)
    {

        $isOutOfRange = filter_var(
            $userId,
            FILTER_VALIDATE_INT,
            array('options' => array('min_range' => 1, 'max_range' => 50000))
        ) === FALSE;

    if ($isOutOfRange) {
        throw new RuntimeException('Contact ID out of range.');
    }

    $this->userId = $userId;

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