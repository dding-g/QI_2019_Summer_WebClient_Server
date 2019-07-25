<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


//require '\vendor\slim\pdo';

final class SignUPController extends BaseController
{

  protected $logger;
  protected $testModel;
  protected $emailModel;

  //construcor, inicialize in dependencies.php
  public function __construct($logger, $testModel, $emailModel)
  {
      $this->logger = $logger;
      $this->test = $testModel;
      $this->emailconfig = $emailModel;
  }



  public function view_sign_up(Request $request, Response $response, $args)
  {
    $this->view->render($response, 'sign_up.twig', ['post' => $post, 'flash' => $messages]);
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

  //process when sign-up email authorized / routes.php access
  public function user_authorized_process(Request $request, Response $response, $args)
  {
    $user_data_json = $this->test->getTempUserData_Using_AuthCode($args['authorized_code']);
    $user_data_arr = json_decode($user_data_json, true);
    //when comparing true, INSERT user_authorized table and DELETE user_temporary table tuple
    if($args['authorized_code'] == $user_data_arr['verification_code'])
    {
       // set data in user_authorized and delete temp data
      if($this->test->setUserData_userAuthTable($user_data_arr)){
        echo "인증";
        $this->test->deleteData_userTempTable($user_data_arr);
        return 1;
      }
      else{
        echo "비인증";
        return 0;
      }

    }else{
      echo $args['authorized_code'].'\n===============';
      echo $user_data_arr['verification_code'];

      return 0;
    }

  }


  //sign up process method
  public function sign_up_process(Request $request, Response $response, $args)
  {
      $user_data = $request->getParsedBody();

      $user_data['hashed_password'] = password_hash($user_data['Password'], PASSWORD_DEFAULT);
      $user_data['authorized_code'] = $authorized_code = password_hash(date("Y-m-d H:i:s"), PASSWORD_DEFAULT);

      $this->test->addUser($user_data);
      $this->emailconfig->sendMail($user_data['Email'], $user_data['authorized_code']);

      echo "\nSuccess Send email";

      return $response;
   }
}
