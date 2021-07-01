<?php


namespace app\Infrastructure;

use app\Domain\Entity\User;
use app\Domain\ValueObject\UserId;
use app\Domain\ValueObject\Name;
use app\Domain\ValueObject\Email;
use app\Domain\ValueObject\Password;
use app\Infrastructure\UserQueryRepository;
use app\Domain\Repository\UserCommandRepositoryInterface;
use JsonException;
use RuntimeException;

class UserCommandRepository implements UserCommandRepositoryInterface {


    private array $users;
    private object $objUsers;

    public function __construct() {

    	$this->objUsers =  new UserQueryRepository();
        $this->users = $this->objUsers->getUsers();

    }
    public function addUser(
        Name $name,
        Email $email,
        Password $password
    ): void  {

        $newUserId = 1;
        if (count($this->users) > 0) {
            $newUserId = end($this->users)["id"] + 1;
        }

        try {
            $UserData =  (new User(
                new UserId($newUserId),
                $name,
                $email,
                $password
            ));

             $data = [

              'id' => (string) $UserData->getId(),
              'name' => (string) $UserData->getName(),
             'email' => (string) $UserData->getEmail(),
             'password' => (string) $UserData->getPassword()];

            $this->objUsers->save($data );

        } catch (JsonException $e) {
            throw new RuntimeException('User data is invalid.'. $e);
        }
    }

    public function removeUser(UserId $UserId): void {
           $this->objUsers->delete($UserId->getId());
    }

    public function updateUser(User $updatedUser): void {
    	
    }
}