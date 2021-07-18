<?php


namespace App\Domain\UseCase\User;

use app\Domain\Repository\UserQueryRepositoryInterface;
use app\Domain\Entity\User;
use App\Domain\UseCase\User\GetUsersInteractor;
use app\Domain\ValueObject\User\UserId;
use RuntimeException;

class GetUserInteractor {

    private UserQueryRepositoryInterface $queryRepo;

    public function __construct(
        UserQueryRepositoryInterface $queryRepo
    )
    {
        $this->queryRepo = $queryRepo;
    }

    public function action(UserId $UserId): User
    {
        $getUsers = new GetUsersInteractor($this->queryRepo);
        $Users = $getUsers->action();

        foreach ($Users as $User) {
            $isUser = $User->getId()->getId() === $UserId->getId();
            if ($isUser) {
                return $User;
            }
        }
        throw new RuntimeException('User ID not found.');
    }
}