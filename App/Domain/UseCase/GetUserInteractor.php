<?php


namespace app\Domain\UseCase;

use app\Domain\Repository\UserCommandRepositoryInterface;
use app\Domain\Repository\UserQueryRepositoryInterface;
use app\Domain\Entity\User;
use app\Domain\ValueObject\UserId;
use app\Domain\ValueObject\Email;
use app\Domain\ValueObject\Name;
use app\Domain\ValueObject\Password;
use RuntimeException;
use Throwable;

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