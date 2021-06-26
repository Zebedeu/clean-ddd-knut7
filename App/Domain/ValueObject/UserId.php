<?php


namespace app\Domain\ValueObject;

use JsonSerializable;
use RuntimeException;

class UserId implements JsonSerializable
{
    private int $userId;

    public function __construct(int $userId)
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

    public function getId(): int
    {
        return $this->userId;
    }

    public function jsonSerialize(): int
    {
        return $this->userId;
    }

    public function __toString()
    {
        return (string)$this->userId;
    }
}