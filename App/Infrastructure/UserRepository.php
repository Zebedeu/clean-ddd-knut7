<?php


namespace app\Infrastructure;
use Ballybran\Database\Drives\AbstractDatabaseInterface;

class UserRepository implements iUserRepository {
    private  AbstractDatabaseInterface $entity;

	public function __construct(AbstractDatabaseInterface $entity){
		$this->entity = $entity;

	}
	public function getUsers() : array {
        return $this->entity->selectManager(' SELECT * FROM user');
    }

    public function getUserById($id) : array {
        return $this->entity->selectManager(" SELECT * FROM user WHERE $id = $id ORDER BY id DESC LIMIT 1 ");
    }

    public function insert($data) {
    return $this->entity->insert(' user', $data);
 
    }

    public function save(array $data, $id) {
        return $this->entity->save(' user', $data, $id, 'id='.$id);

    }
    public function saveContact(array $data, $id) {
        return $this->entity->insert('contacts', $data);
    }
    
    public function lastInsertId() {
        return $this->entity->lastInsertId();
    }
    public function delete(int $id ) {
         $this->entity->delete('user', "id=$id", 1);
    }

    public function update(array $data, int $id) {

       return $this->entity->update('user', $data, "id=$id");

    }

    public function getContacts() {
        return $this->entity->selectManager(' SELECT * FROM contacts');
    }
}