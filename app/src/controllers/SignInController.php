<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class SignInController extends BaseController
{

    public function view_sign_up(Request $request, Response $response, $args)
    {
      $this->view->render($response, 'register.twig', ['post' => $post, 'flash' => $messages]);
      return $response;
    }


    
  public function view_sign_in(Request $request, Response $response, $args)  {

    $this->view->render($response, 'login.twig', ['post' => $post, 'flash' => $messages]);
    return $response;
  }
}
