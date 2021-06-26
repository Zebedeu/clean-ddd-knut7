<?php 

namespace app\Infrastructure;
use RuntimeException;

use app\Domain\Repository\UserQueryRepositoryInterface;

class UserQueryRepository implements UserQueryRepositoryInterface
{

    private  $users;
    public function __construct(  $users) {
        $this->users = $users;
    }
    public function getUsers() : array {

        return $this->users->getUserById();
    }

    public function save( $data)  {

        return $this->users->insert($data, null);


    }
   
}