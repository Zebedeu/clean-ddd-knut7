<?php


namespace app\Infrastructure;

interface iUserRepository {

	public function getUser() : array;

    public function getUserById() : array;
    
    public function insert($data);
    public function save(array $data, $id);
    
    public function lastInsertId();

    public function delete(int $id );


}