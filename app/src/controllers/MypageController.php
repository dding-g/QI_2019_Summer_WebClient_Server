<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class MypageController extends BaseController
{
  public function mypage_view(Request $request, Response $response, $args)
  {
    $this->view->render($response, 'mypage.twig');
    return $response;
  }

  //Get 
  public function change_pw_view(Request $request, Response $response, $args)
  {
    $this->view->render($response, 'change_password.twig');
    return $response;
  }

  //Web page Change Password
  public function web_change_pw_process(Request $request, Response $response, $args)
  {
    $cp_data = $request->getParsedBody();
    $result_code = $this->db_model->user_change_password($cp_data);

    return $response->withJson(json_decode($result_code)); 
  }

  //Android page Change Password
  public function android_change_pw_process(Request $request, Response $response, $args)
  {
    $cp_data_json = file_get_contents('php://input');
    $cp_data = json_decode($cp_data_json, true);
    
    return $this->db_model->user_change_password($cp_data);
  }

}
