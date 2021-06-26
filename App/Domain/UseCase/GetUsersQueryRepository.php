<?php


namespace app\Domain\UseCase;

use app\Domain\Repository\UserQueryRepositoryInterface;
use app\Domain\Entity\User;
use app\Domain\ValueObject\Email;
use app\Domain\ValueObject\UserId;
use app\Domain\ValueObject\Name;
use app\Domain\ValueObject\Password;
use RuntimeException;
use Throwable;

class GetUsersQueryRepository
{
    private UserQueryRepositoryInterface $commandRepo;

    public function __construct(
        UserQueryRepositoryInterface $commandRepo
    )
    {
        $this->commandRepo = $commandRepo;
    }

    public function action(): array
    {
        
        $userActRow = $this->commandRepo->getUsers();
        $users = [];

        foreach ($userActRow as $user) {
        	try {

        		$users[] = new User(
        			new UserId( $user['id']),
        			new Name($user['name']),
        			new Email($user['email']),
        			new Password($user['password'])
                );
        		
        	} catch (Exception $e) {
        		continue;
        	}
        }
        return $users;
    }
}