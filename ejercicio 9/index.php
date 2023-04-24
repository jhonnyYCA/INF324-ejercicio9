<?php
   require_once "models/persona.php";
switch ($_SERVER['REQUEST_METHOD']){
    case 'GET':
        if(isset($_GET['ci'])){
            echo json_encode(persona::getWhere($_GET['ci']));
        }else{
            echo json_encode(persona::getAll());
        }
        break;
    case 'POST':
        $datos = json_decode(file_get_contents('php://input'));
    if($datos != NULL){
        if(persona::insert($datos->ci,$datos->nombreCompleto,$datos->fechaNacimineto,$datos->departamento)){
            http_response_code(200);
        }else{
            http_response_code(400);
        }
    }else{
        http_response_code(405);
    }
    break;

    case 'PUT':
        $datos = json_decode(file_get_contents('php://input'));
    if($datos != NULL){
        if(persona::update($datos->ci,$datos->nombreCompleto,$datos->fechaNacimiento,$datos->departamento)){
            http_response_code(200);
        }else{
            http_response_code(400);
        }
    }else{
        http_response_code(405);
    }
    break;
    case 'DELETE':
        if(isset($_GET['ci'])){
            if(persona::delete($_GET['ci'])){
                http_response_code(200);
            }else{
                http_response_code(400);
            }
        }else{
            http_response_code(405);

        }
    break;
    default:
    break;
}