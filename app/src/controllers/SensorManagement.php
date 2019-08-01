<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use Slim\Container;

final class SensorManagement extends BaseController
{
  public function __construct(Container $c){
    $this->sensor_db_model = $c->get('Sensor_DBModel');
  }
  //Sensor Registration
  public function sensor_registration_process(Request $request, Response $response, $args)  {

    $sensor_data_json = file_get_contents('php://input');
    $sensor_data = json_decode($sensor_data_json, true);  
    
    return $this->sensor_db_model->sensor_registration($sensor_data);
  }

  public function airQuality_record(Request $request, Response $response, $args)  {

    $air_q_data_json = file_get_contents('php://input');
    $air_q_data = json_decode($air_q_data_json, true);  

    $is_sign_out = $this->db_model->air_quality_data_record($air_q_data);
  }
  
}
