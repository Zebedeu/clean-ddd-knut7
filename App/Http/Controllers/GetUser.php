<?php

namespace app\Http\Controllers;

use Ballybran\Core\Controller\AbstractController;
use app\Domain\UseCase\User\GetUserInteractor;
use app\Domain\ValueObject\User\UserId;
use app\Infrastructure\UserQueryRepository;
use Symfony\Component\HttpFoundation\Response;
use Throwable;
use Exception;

class GetUser extends AbstractController
{
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