<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


final class SignOutController
{
    
  public function __construct(Container $c)
  {
      $this->db_model = $c->get('DBModel');
  }

  public function sign_out_process(Request $request, Response $response, $args)  {

    $user_data = $request->getParsedBody();

    $is_sign_out = $this->db_model->is_sign_out_update($user_data['usn']);
    
    if($is_sign_out == 1)
      return $response->withJson("{'is_sign_in' : 0}");
    else if($is_sign_out == 0)
      return $response->withJson("{'error' : 'unexcepted error'}");
    else if($is_sign_out == 2)
      return $response->withJson("{'error' : 'USN not found in DB or Already value is in DB'}");
    else
      return $response->withJson("{'error' : $is_sign_out}");
  }
  
}
