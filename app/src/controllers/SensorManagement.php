<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use Slim\Container;

final class SensorManagement extends BaseController
{

  //Sensor Registration
  public function sensor_registration_process(Request $request, Response $response, $args)  {

    $sensor_data_json = file_get_contents('php://input');
    $sensor_data = json_decode($sensor_data_json, true);  
    
    return $this->sensor_db_model->sensor_registration($sensor_data);
  }

  //WEB : Sensor DeRegistration
  public function web_sensor_deregistration_process(Request $request, Response $response, $args)  {
    $dereg_sensor = $request->getParsedBody();
    
    return $this->sensor_db_model->sensor_Deregistration($dereg_sensor);
}

  //ANDROID : Sensor DeRegistration
  public function android_sensor_deregistration_process(Request $request, Response $response, $args)  {

      $dereg_sensor_json = file_get_contents('php://input');
      $dereg_sensor = json_decode($dereg_sensor_json, true);  
      
      return $this->sensor_db_model->sensor_Deregistration($dereg_sensor);
  }
  
  //Air Quality Data Record (include Real-time table)
  public function airQuality_record(Request $request, Response $response, $args)  {

    $air_q_data_json = file_get_contents('php://input');
    $air_q_data = json_decode($air_q_data_json, true);  

    $air_q_status = $this->sensor_db_model->air_quality_data_record($air_q_data);

    return $this->sensor_db_model->get_deviceList_usn($air_q_status);
  }


  //display device information
  public function android_device_list_view_process(Request $request, Response $response, $args)  {
    $usn_json = file_get_contents('php://input');
    $usn = json_decode($usn_json, true);  

    return $this->sensor_db_model->get_deviceList_usn($usn['usn']);
  }

  
  //WEB : display device information 
  public function web_device_list_view_process(Request $request, Response $response, $args)  {
    $usn = $request->getParsedBody();
    return $response->withjson(json_decode( $this->sensor_db_model->get_deviceList_usn($usn['usn'] )));
  }
}
