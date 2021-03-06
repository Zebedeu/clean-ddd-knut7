<?php


namespace App\Domain\UseCase\User;

use app\Domain\Repository\UserCommandRepositoryInterface;
use app\Domain\ValueObject\User\Email;
use app\Domain\ValueObject\User\Name;
use app\Domain\ValueObject\User\Password;
use RuntimeException;
use Throwable;

class AddUserIteractor
{
    private UserCommandRepositoryInterface $commandRepo;

    public function __construct(
        UserCommandRepositoryInterface $commandRepo
    )
    {
        $this->commandRepo = $commandRepo;
    }

    public function action(
        Name $name,
        Email $email,
        Password $password
    ): void
    {

        try {
            $this->commandRepo->addUser(
                $name,
                $email,
                $password
            );

        } catch (Throwable $e) {
            throw new RuntimeException('Unable to User contact.'. $e);
        }
    }
}