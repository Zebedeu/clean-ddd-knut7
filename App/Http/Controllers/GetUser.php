<?php

declare(strict_types=1);

namespace app\Http\Controllers;

use Ballybran\Core\Controller\AbstractController;

use app\Domain\UseCase\GetUserInteractor;
use app\Domain\ValueObject\UserId;
use app\Infrastructure\UserQueryRepository;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use app\Domain\UseCase\AddUserIteractor;
use app\Infrastructure\UserCommandRepository;
use app\Domain\ValueObject\Email;
use app\Domain\ValueObject\Name;
use app\Domain\ValueObject\Password;
use Throwable;
use Exception;
class GetUser extends AbstractController
{
    private Response $response;
    private UserId $id;

    public function __construct()
    {
        parent::__construct();

        $this->response = new  Response;
       
    }

    public function getUserId(int $id)
    {
        $this->id = new UserId($id);

        $queryRepo = new UserQueryRepository( );
        $getUser = new GetUserInteractor( $queryRepo);

        try {
            $user = 
                $getUser->action($this->id);
            
        } catch (Throwable $th) {           
                throw new Exception("Error Processing Request $th", 1);
                
        }

            echo ($user->getName());
        

    }

}