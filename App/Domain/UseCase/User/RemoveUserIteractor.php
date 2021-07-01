<?php

namespace App\Domain\UseCase\User;

use app\Domain\Repository\UserCommandRepositoryInterface;
use app\Domain\ValueObject\UserId;
use Ballybran\Helpers\Http\Hook;
use RuntimeException;

class RemoveUserIteractor {

  private UserCommandRepositoryInterface  $comandRepo;

  public function __construct( UserCommandRepositoryInterface  $comandRepo) {
        $this->comandRepo = $comandRepo;
  }

  public function action(UserId $userId): void {

    try {
      $this->comandRepo->removeUser($userId);
      Hook::Header('dashboard');
    } catch (\Throwable $th) {
     
      throw new RuntimeException(
        'Unable to remove contact: ' . $th->getMessage()
      );
      
    }
  }
}