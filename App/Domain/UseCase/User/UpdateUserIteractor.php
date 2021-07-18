<?php

namespace app\Domain\UseCase\User;
use app\Domain\Entity\User;
use app\Domain\Repository\UserCommandRepositoryInterface;
use app\Infrastructure\UserCommandRepository;

class UpdateUserIteractor {

  private UserCommandRepositoryInterface $comandRepo;

  public function __construct(UserCommandRepository $comandRepo) 
  {
      $this->comandRepo = $comandRepo;
  }

  public function action( User $updateUser): void {
    $this->comandRepo->updateUser( $updateUser );
  }
}