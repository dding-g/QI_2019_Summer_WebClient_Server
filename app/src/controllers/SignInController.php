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

  public function sign_in_process(Request $request, Response $response, $args)  {

    $user_data = $request->getParsedBody();

    $db_userInfo_json = $this->test->getUserInfo($user_data['email']);
    $db_userInfo = json_decode($db_userInfo, true);

    if(password_verify($user_data['password'],$db_userInfo['hashed_password'])){
      $this->test->is_sign_in_update
    }
    echo "\nSuccess Send email";
    return $response;
  }
}
