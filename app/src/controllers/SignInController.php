<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$host = '127.0.0.1:3306';
$user = 'root';
$pw = '12345678';
$dbName = 'mydb';
$mysqli = mysqli_connect($host, $user, $pw, $dbName);

final class SignInController extends BaseController
{

  public function view_sign_in(Request $request, Response $response, $args)
  {

    $this->view->render($response, 'login.twig', ['post' => $post, 'flash' => $messages]);
    return $response;
  }
}
