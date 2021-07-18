<?php

namespace app\Http\Controllers;

use Ballybran\Core\Controller\AbstractController;
use app\Domain\UseCase\Contact\AddUserContactIteractor;
use app\Infrastructure\ContactCommandRepository;
use Symfony\Component\HttpFoundation\Request;
use app\Domain\ValueObject\Contact\Address;
use app\Domain\ValueObject\Contact\Country;
use app\Domain\ValueObject\Contact\City;
class AddContact extends AbstractController {

  public function __construct()
  {
    parent::__construct();
  }

  public function index() {

    $this->view->title = "add Contacto";
    $this->view->render($this, 'contact');
  }

  private function getExecutParamns(Request $request): array {
    $executionParams = $request->request->all();
    return [
        "address" => new Address($executionParams['address']),
        "country" => new Country($executionParams['country']),
        "city" => new City($executionParams['city'])
    ];
  }
  public function postData(Request $request) {

    $params = $this->getExecutParamns($request);
    $repo = new ContactCommandRepository();
    $contact = new AddUserContactIteractor($repo);
    $contact->action( $params['address'], $params['country'], $params['city'] );
  }
}