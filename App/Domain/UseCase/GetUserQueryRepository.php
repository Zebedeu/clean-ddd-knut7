<?php 

namespace app\Infrastructure;
use RuntimeException;

use app\Domain\Repository\UserQueryRepositoryInterface;

class GetUserQueryRepository
{
    private UserQueryRepositoryInterface $queryRepo;

    public function __construct( UserQueryRepositoryInterface  $queryRepo ){
        $this->queryRepo = $queryRepo;
    }

    public function action( UserId $userId) : User {
        $getUsers = new GetUsersQueryRepository($this->queryRepo);
        $users = $getUsers->action();

        foreach ($users as $key => $user) {
            $isUser = $user->getId()->getId() === $userId->getId();

            if($isUser) {
                return $user;
            }
        }
        throw new RuntimeException('User ID not found.');

    }
   
}