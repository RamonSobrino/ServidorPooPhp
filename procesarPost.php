<?php
/**
 * Created by PhpStorm.
 * User: ramon
 * Date: 28/11/2018
 * Time: 22:36
 */
require_once ('FoodEstablishment.php');
require_once ('LocalBusiness.php');
require_once ('persistencia.php');

function procesar_post()
{

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Allow: GET, POST, PUT, DELETE');
    $request = obtener_request();
    if ($request == null) {
        echo 'POST: mala info';
    } else if (count($request) == 1) {
        $object = file_get_contents("php://input");
        $json_a = json_decode($object);
        $vars_case = get_object_vars($json_a);
        foreach ($vars_case as $nombre => $valor) {
            if($nombre == '@type'){
                $tipo = $valor;
            }
        }
        $local = null;
        if ($request[0] == 'LocalBusiness') {
            if($tipo== 'LocalBusiness'){
                $local = new LocalBusiness($json_a);

            }else {
                http_response_code(400);
                exit( "Elemento no ha sido agragedo no es del tipo correcto");
            }
        } else if ($request[0] == 'FoodEstablishment') {
            if($tipo== 'FoodEstablishment'){
                $local = new FoodEstablishment($json_a);
            }else {
                http_response_code(400);
                exit( "Elemento no ha sido agragedo no es del tipo correcto");
            }
        } else {
            http_response_code(400);
            exit( "Ruta no encontrada");
        }
        if ($local!=null) {
            $local->id = obtener_nuevo_id();
            $vector = obtener_objetos();
            $vector[] = $local;
            guardar_objetos($vector);
            http_response_code(200);
            exit( "Elemento agregado");        }
    } else {
        http_response_code(400);
        exit( "Ruta no encontrada");
    }
}