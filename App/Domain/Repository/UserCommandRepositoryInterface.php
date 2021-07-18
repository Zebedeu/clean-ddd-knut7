<?php


namespace app\Domain\Repository;

use app\Domain\Entity\User;
use app\Domain\ValueObject\UserId;
use app\Domain\ValueObject\Email;
use app\Domain\ValueObject\Name;
use app\Domain\ValueObject\Password;

interface UserCommandRepositoryInterface
{
    public function addUser(
        Name $name,
        Email $email,
        Password $password
    ): void;

    public function removeUser(UserId $UserId): void;

    public function updateUser(User $updatedUser): int;
}