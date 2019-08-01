<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


final class SignUPViewContoller extends BaseController
{

  public function view_sign_up(Request $request, Response $response, $args)
  {
    $this->view->render($response, 'register.twig');
    return $response;
  }

}
