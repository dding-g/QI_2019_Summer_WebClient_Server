<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


final class SignUPController extends BaseController
{

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
    $authorized_code = password_hash(date("Y-m-d H:i:s"), PASSWORD_DEFAULT);
    $authorized_code_replace = str_replace(array(':', '\\', '/' , '.'), 'J' ,$authorized_code);
    $authorized_code_slice = substr($authorized_code_replace, 7);
    return $authorized_code_slice;
  }

  //process when sign-up email authorized / routes.php access
  public function user_authorized_process(Request $request, Response $response, $args)
  {
    $user_data_json = $this->db_model->getTempUserData_Using_AuthCode($args['authorized_code']);
    $user_data_arr = json_decode($user_data_json, true);
    //when comparing true, INSERT user_authorized table and DELETE user_temporary table tuple
    if($args['authorized_code'] == $user_data_arr['verification_code'])
    {
       // set data in user_authorized and delete temp data
      if($this->db_model->setUserData_userAuthTable($user_data_arr)){
        $this->db_model->deleteData_userTempTable($user_data_arr);
        echo ("<script language=javascript> 
                alert('Success Authorized!! Welcome to Kangaroo!!');
                location.href='http://teama-iot.calit2.net/';
              </script>");
        return 1;
      }
      else{
        echo ("<script language=javascript> 
                alert('Fail to Authorized!!');
                location.href='http://teama-iot.calit2.net/';
              </script>");
        return 0;
      }
    }else{
      echo ("<script language=javascript> 
                alert('wrong verification code!!');
              </script>");
      return 0;
    }

  }


  //sign up process method
  public function sign_up_process(Request $request, Response $response, $args)
  {
      $user_data = $request->getParsedBody();

      $user_data['hashed_password'] = password_hash($user_data['Password'], PASSWORD_DEFAULT);
      $user_data['authorized_code'] = $this->make_authorized_code();

      $is_sign_up = $this->db_model->addUser($user_data);

      $email_address = $user_data['Email'];


      if($is_sign_up == 1){
        $this->emailconfig->sendMail($user_data['Email'], $user_data['authorized_code']);
        echo ("<script language=javascript> 
                alert('Send Email complete!! Please check email !!');
                location.href='http://teama-iot.calit2.net/';
              </script>");
        return 1;
      }else if($is_sign_up == 6){
        echo ("<script language=javascript> 
                alert('Already exist email!');
                location.href='http://teama-iot.calit2.net/qi/sign-in';
              </script>");
        return 6;
      }else{
        echo ("<script language=javascript> 
                alert('Sorry. unexcepted error occurred
                      /\n/error : $is_sign_up');
                location.href='http://teama-iot.calit2.net/';
              </script>");
        return 0;
      }
   }

   //mobile sign up process method
  public function mobile_sign_up_process(Request $request, Response $response, $args)
  {
    try{
      $user_data_json = file_get_contents('php://input');
      $user_data = json_decode($user_data_json, true);  
      
      $user_data['hashed_password'] = password_hash($user_data['Password'], PASSWORD_DEFAULT);
      $user_data['authorized_code'] = $this->make_authorized_code();

      $is_sign_up = $this->db_model->addUser($user_data);
      
      if($is_sign_up == 1){
        $this->emailconfig->sendMail($user_data['Email'], $user_data['authorized_code']);
        $result_code = array('success'=>1, 'error'=>'none');
        return json_encode($result_code);
        
      }else if($is_sign_up == 6){
        $result_code = array('success'=>0, 'error'=>6);
        return json_encode($result_code);
      }
      else{
        $result_code = array('success'=>0, 'error'=>0);
        return json_encode($result_code);
      }
      
    }catch(\Exception $e){
      $result_code = array('success'=>0, 'error'=>0, 'error_msg'=>$e->getMessage());
      return json_encode("{'success' : 0, 'error' : 0}");
    }

   }

}
