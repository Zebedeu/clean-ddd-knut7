<?php 
    namespace app\Http\Controllers;

use app\Domain\Entity\User;
use app\Domain\UseCase\User\UpdateUserIteractor;
use app\Domain\ValueObject\User\UserId;
use app\Domain\ValueObject\User\Email;
use app\Domain\ValueObject\User\Name;
use app\Domain\ValueObject\User\Password;
use app\Infrastructure\UserCommandRepository;
use RuntimeException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class UpdateUser {
    
    public function __construct()
    {
      
    }

    private function getExecutionParams(Request $request): array
    {

      return [
          "id" => new UserId((int)$request->get('id')),
          "name" => new Name($request->get('name')),
          "email" => new Email($request->get('email')),
          "password" => new Password($request->get('password'))
        ];
    }
    
    public function update(Request $request, Response $response){

      $userCommandRepo  = new UserCommandRepository( );
      $addUser = new UpdateUserIteractor( $userCommandRepo );

      $params = $this->getExecutionParams($request);
      $user = new User(
        $params['id'],
        $params['name'],
        $params['email'],
        $params['password']);

      try {
          $data =  $addUser->action(
            $user
        );

        var_dump($data);
          
      } catch (Throwable $th) {
              throw new RuntimeException(
            'User update failed: ' . $th->getMessage()
        );

      }
  }
}
