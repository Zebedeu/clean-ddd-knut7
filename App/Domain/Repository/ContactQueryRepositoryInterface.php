<?php 

namespace app\Domain\Repository;

interface ContactQueryRepositoryInterface
{
    public function getContacts(): array;
}