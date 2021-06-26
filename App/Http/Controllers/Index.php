<?php

namespace app\Http\Controllers;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use \Ballybran\Helpers\Http\RecursiveDirectoryIterator;
use Ballybran\Core\Controller\AbstractController;
use Ballybran\Helpers\Security\Validate;
use Ballybran\Helpers\Security\Val;
use Ballybran\Core\View\View;
use Ballybran\Helpers\Http\Hook;
use Ballybran\Helpers\Utility\Hash;
use Ballybran\Helpers\Stdlib\HydratorConverter;
use app\Domain\UseCase\AddUserIteractor;
use app\Infrastructure\UserCommandRepository;
use app\Domain\ValueObject\UserId;
use app\Domain\ValueObject\Email;
use app\Domain\ValueObject\Name;
use app\Domain\ValueObject\Password;
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

        return new UserId( $this->model->getUser()[0]['id'] ?? 1 );
    }

        private function getExecutionParams(Request $request): array
    {
        $executionParams = $request->request->all();
        return [
            "name" => new Name($executionParams['name']),
            "email" => new Email($executionParams['email']),
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
        $userModel['data'] = $this->model->getUser();

        $this->view->add( $userModel ); 
        $this->view->render($this , 'dashboard');


    }

    function delete($id){

        try {
            if( $id ){

               $this->model->delete($id);
                Hook::header('dashboard');
            } 
        } catch (Exception $e) {
            throw new Exception("Error Processing Request", 1);
            
        }
    }

    public function getVer() {
        echo "string";
    }



}