<?php


namespace app\Infrastructure;
use Ballybran\Database\Drives\AbstractDatabaseInterface;

class UserRepository implements iUserRepository {
    private  AbstractDatabaseInterface $entity;

	public function __construct(AbstractDatabaseInterface $entity){
		$this->entity = $entity;

	}
	public function getUser() : array {
        return $this->entity->selectManager(' SELECT * FROM user');
    }

    public function getUserById() : array {
        return $this->entity->selectManager(' SELECT * FROM user ORDER BY id DESC LIMIT 1');
    }

    public function insert($data) {
    return $this->entity->insert(' user', $data);
 
    }

    public function save(array $data, $id) {
        return $this->entity->save(' user', $data, $id, 'id='.$id);

    }
    
    public function lastInsertId() {
        return $this->entity->lastInsertId();
    }
    public function delete(int $id ) {
         $this->entity->delete('user', "id=$id", 1);
    }
}