<?php 

namespace app\Infrastructure;
use RuntimeException;

use app\Domain\Repository\UserQueryRepositoryInterface;

class UserQueryRepository implements UserQueryRepositoryInterface
{

    private UserRepository $users;
    
    public function __construct( ) {
        $this->users = new UserRepository(  new \Ballybran\Database\Drives\AbstractDatabasePDO(
            [
                'dns' => DB_TYPE . ':host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME ,
                'users' => DB_USER ,
                'pass' => DB_PASS
        
            ]
        ));
    }
    public function getUsers() : array {

        return $this->users->getUsers();
    }

    public function getUseById( $id) : array {

        return $this->users->getUserById($id);
    }

    public function save( $data)  {

        return $this->users->insert($data, null);
    }

    public function delete($id) {
        return $this->users->delete($id);
    }

    public function update($data, $id) {
        return $this->users->update($data, $id);
    }
   
}