<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class ForgottenPWController extends BaseController
{
  public function forgottenPW_view(Request $request, Response $response, $args)
  {
    $this->view->render($response, 'forgot-password.twig');
    return $response;
  }

  public function forgottenPW_process(Request $request, Response $response, $args)
  {
    
    return $response;
  }
}
