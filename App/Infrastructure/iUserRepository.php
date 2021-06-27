<?php


namespace app\Infrastructure;

interface iUserRepository {

	public function getUsers() : array;

    public function getUserById( $id) : array;
    
    public function insert($data);
    public function save(array $data, $id);
    
    public function lastInsertId();

    public function delete(int $id );


}