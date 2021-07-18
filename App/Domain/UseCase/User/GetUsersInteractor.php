<?php

namespace app\Domain\UseCase\User;

use App\Domain\Entity\User;
use App\Domain\Repository\UserQueryRepositoryInterface;
use App\Domain\ValueObject\User\UserId;
use App\Domain\ValueObject\User\Name;
use App\Domain\ValueObject\User\Email;
use App\Domain\ValueObject\User\Password;
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
