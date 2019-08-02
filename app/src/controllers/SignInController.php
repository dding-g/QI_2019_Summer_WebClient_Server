<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


final class SignInController extends BaseController
{
    
  public function view_sign_in(Request $request, Response $response, $args)  {
    $this->view->render($response, 'login.twig');
    return $response;
  }

  public function sign_in_process(Request $request, Response $response, $args)  {

    $user_data = $request->getParsedBody();

    $db_userInfo_json = $this->db_model->getUserInfo($user_data['email']);
    $db_userInfo = json_decode($db_userInfo_json, true);
    
    if($db_userInfo['result_code'] != 1){

      if($db_userInfo['result_code'] == 2) // if in auth tabel not exitst email, than check one more time in temp table
        return $this->db_model->get_user_temp_data($user_data['email']);
      
      return json_encode($db_userInfo);
    }
    
       //sign-in : 1, sign-out : 0
    if(password_verify($user_data['password'],$db_userInfo['hashed_password'])){
        $sign_in_json = $this->db_model->is_sign_in_update($user_data);

        $sign_in_decode = json_decode($sign_in_json, true);
        $sign_in = $sign_in_decode['result_code'];

        if($sign_in == 1){
          
          $user_info_json = $this->db_model->getUserInfo($user_data['email']);
          $user_info = json_decode($user_info_json, true);
          $usn = $user_info['usn'];

          $json = array(
                        'result_code' => 1,
                        'email'=>$user_data['email'],
                        'usn'=>$usn,
                        'firstname'=>$user_info['firstname'],
                        'lastname'=>$user_info['lastname'],
                        'nickname'=>$user_info['nickname']
                      );
          return $response->withJson($json);

        }else if($sign_in == 2){
          
          $json = array(
                        'result_code' => 0, 
                        'error_message'=>'Sign in fail! Not found email'
                  );
          return $response->withJson($json);
        
        }
    }else{
      
         $json = array(
                        'result_code' => 0, 
                        'error_message'=>'Sign in fail! Not correct PW'
                      );
      return $response->withJson($json);
    }

  }


  //android sign in process
  public function android_sign_in_process(Request $request, Response $response, $args)  {
    try{
      $user_data_json = file_get_contents('php://input');
      $user_data = json_decode($user_data_json, true);  
      
      $db_userInfo_json = $this->db_model->getUserInfo($user_data['email']);
      $db_userInfo = json_decode($db_userInfo_json, true);

      if($db_userInfo['result_code'] != 1){

        if($db_userInfo['result_code'] == 2) // if in auth tabel not exitst email, than check one more time in temp table
          return $this->db_model->get_user_temp_data($user_data['email']);
        
        return json_encode($db_userInfo);
      }

      //sign-in : 1, sign-out : 0
      if(password_verify($user_data['Password'],$db_userInfo['hashed_password'])){
        $sign_in_json = $this->db_model->is_sign_in_update($user_data);

        $sign_in_decode = json_decode($sign_in_json, true);
        $sign_in_status = $sign_in_decode['result_code'];

        if($sign_in_status == 1){
          $usn_json = $this->db_model->getUserInfo($user_data['email']);
          $usn = json_decode($usn_json, true);

          $sign_in_decode['usn'] = (int)$usn['usn'];
          return json_encode($sign_in_decode); //success
        }

      }else{
        $json = array('result_code' => 3,
                    'message'=> 'Fail. PW is not corret');
        return json_encode($json);
      }
    }catch(\Exception $e){
      $json = array('result_code' => 0,
                    'error_message'=>$e->getMessage());
      return json_encode($json);
    }
  }


}//end of class