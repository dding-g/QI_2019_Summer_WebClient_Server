<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$host = '127.0.0.1:3306';
$user = 'root';
$pw = '12345678';
$dbName = 'mydb';
$mysqli = mysqli_connect($host, $user, $pw, $dbName);

final class SignUPController extends BaseController
{

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
  public function make_authorized_code(){
    return password_hash(date("Y-m-d H:i:s"), PASSWORD_DEFAULT);
  }


  //sign up process method
  public function sign_up_process(Request $request, Response $response, $args)
  {

      $user_data = $request->getParsedBody();

      //make hashed pw and authorized code use password_hash()
      $hashed_password = hash_password($user_data['Password']);
      $authorized_code = make_authorized_code();


      //query to send DB for sign up
      $query_signup = "INSERT INTO mydb VALUES (
                        {$user_data['Email']}, {$user_data['FirstName']}, {$user_data['LastName']},
                        {$hashed_password}, {$user_data['pregnancy_month']}, {$user_data['birth']},
                        {$user_data['phone']}, {$user_data['gender']}, {$authorized_code}
                      )";

      try {
          //send query to DB for sign-up
          mysqli_query($mysqli, $query_signup);
      } catch (\Exception $e) {
          echo $e->getMessage();
          die;
      }


      return $response;
   }

}
