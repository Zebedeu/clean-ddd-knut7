<?php 

namespace App\Http\Controllers;

use App\Domain\UseCase\User\RemoveUserIteractor;
use app\Domain\ValueObject\UserId;
use app\Infrastructure\UserCommandRepository;

class RemoveUser {

  private UserId $id;
  public function __construct()
  {
    
  }

  public function removeById(int $id) {
     
    $this->id = new UserId($id);
    $repository= new UserCommandRepository();
    $user = new RemoveUserIteractor($repository);

    $getUser = $user->action($this->id);

  }
}