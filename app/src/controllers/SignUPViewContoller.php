<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

//require '\vendor\slim\pdo';

final class SignUPController extends BaseController
{

  public function view_sign_up(Request $request, Response $response, $args)
  {
    $this->view->render($response, 'register.twig', ['post' => $post, 'flash' => $messages]);
    return $response;
  }
 
}
