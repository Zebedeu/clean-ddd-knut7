<?php

namespace app\Http\Controllers;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use \Ballybran\Helpers\Http\RecursiveDirectoryIterator;
use Ballybran\Core\Controller\AbstractController;
use Ballybran\Core\View\View;
use Ballybran\Helpers\Http\Hook;
use app\Domain\UseCase\User\AddUserIteractor;
use app\Infrastructure\UserCommandRepository;
use app\Domain\ValueObject\User\UserId;
use app\Domain\ValueObject\User\Email;
use app\Domain\ValueObject\User\Name;
use app\Domain\ValueObject\User\Password;
use Ballybran\Helpers\Security\ValidateTypes;
use Ballybran\Helpers\Security\ValidateTypesInterface;
use Exception;
use Throwable;

class Index extends AbstractController
{
    public function __construct()
    {
        parent::__construct();

        $this->view = new View();
    }

    public function index()
    {
        $this->view->title = "Welcome!!!";
        $this->view->render($this , 'index');
    }

    public function teste(Request $request, Response $response)  {
       // retrieve a COOKIE value
            $a = $request->getClientIp();
            $b = new RecursiveDirectoryIterator(DIR_FILE);
            var_export($b->hasChildren());

            $response->setContent($a);    
              $response->send();
   
    }

    private function getUserId(): UserId {

        return new UserId( $this->model->getUsers()[0]['id'] ?? 1 );
    }

        private function getExecutionParams(Request $request): array
    {
        $executionParams = $request->request->all();
        return [
            "name" => new Name($executionParams['name']),
            "email" => new Email($executionParams['email'], new ValidateTypes),
            "password" => new Password($executionParams['password'])
        ];
    }

    public function postData(Request $request, Response $response){

               $userCommandRepo  = new UserCommandRepository( $this->model );
               $addUser = new AddUserIteractor( $userCommandRepo );

            $params = $this->getExecutionParams($request);

               try {
                  $addUser->action(
                $params['name'],
                $params['email'],
                $params['password']
            );
                  Hook::header('dashboard');
                   
               } catch (Throwable $th) {
            $this->response->getBody()->write(
                'Contact creation failed: ' . $th->getMessage()
            );
            return $this->response->withStatus(500);
            }
    }

    public function dashboard() {
        $userModel['data'] = $this->model->getUsers();

        $this->view->add( $userModel ); 
        $this->view->render($this , 'dashboard');


    }
}