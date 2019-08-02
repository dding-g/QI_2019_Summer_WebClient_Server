<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use Slim\Container;

final class ProfileController extends BaseController
{

  //profile Registration
  public function profile_view(Request $request, Response $response, $args)  {
    $this->view->render($response, 'profile.twig');
    return $response;
  }

}
