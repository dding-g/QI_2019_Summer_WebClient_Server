<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

//require '\vendor\slim\pdo';

final class SignUPController extends BaseController
{

  protected $logger;
  protected $testModel;

  //construcor, inicialize in dependencies.php
  public function __construct($logger, $testModel)
  {
      $this->logger = $logger;
      $this->test = $testModel;
  }



  public function view_sign_up(Request $request, Response $response, $args)
  {
    $this->view->render($response, 'register.twig', ['post' => $post, 'flash' => $messages]);
    return $response;
  }
  //password hashed method
  public function hash_password($str_pw)
  {
      return password_hash($str_pw, PASSWORD_DEFAULT);
  }

  //make authorized code for send email
  public function make_authorized_code()
  {
    return password_hash(date("Y-m-d H:i:s"), PASSWORD_DEFAULT);
  }


  //sign up process method
  public function sign_up_process(Request $request, Response $response, $args)
  {
      $user_data = $request->getParsedBody();

      $user_data['hashed_password'] = password_hash($user_data['Password'], PASSWORD_DEFAULT);
      $user_data['authorized_code'] = $authorized_code = password_hash(date("Y-m-d H:i:s"), PASSWORD_DEFAULT);

      $this->test->addUser($user_data);

      echo $this->test->getAllUser();
      return $response;
   }

}
