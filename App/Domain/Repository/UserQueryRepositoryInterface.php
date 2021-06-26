<?php 

namespace app\Domain\Repository;

interface UserQueryRepositoryInterface
{
    public function getUsers(): array;
}