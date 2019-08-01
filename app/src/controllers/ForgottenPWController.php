<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class ForgottenPWController extends BaseController
{
  public function forgottenPW_view(Request $request, Response $response, $args)
  {
    $this->view->render($response, 'forgot-password.twig', ['post' => $post, 'flash' => $messages]);
    return $response;
  }
}
