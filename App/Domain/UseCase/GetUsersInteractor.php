<?php

namespace App\Domain\UseCase;

use App\Domain\Entity\User;
use App\Domain\Repository\UserQueryRepositoryInterface;
use App\Domain\ValueObject\UserId;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Email;
use App\Domain\ValueObject\Password;
use Throwable;

class GetUsersInteractor
{
    private UserQueryRepositoryInterface $queryRepo;

    public function __construct(
        UserQueryRepositoryInterface $queryRepo
    )
    {
        $this->queryRepo = $queryRepo;
    }

    public function action(): array
    {
        $UsersRaw = $this->queryRepo->getUsers();
        $Users = [];
        foreach ($UsersRaw as $User) {
            try {
                $Users[] = new User(
                    new UserId((int)$User["id"]),
                    new Name($User["name"]),
                    new Email($User["email"]),
                    new Password($User["password"])
                );
            } catch (Throwable $th) {
                continue;
            }
        }
        return $Users;
    }
}
