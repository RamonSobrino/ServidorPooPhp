<?php
/**
 * Created by PhpStorm.
 * User: ramon
 * Date: 28/11/2018
 * Time: 22:35
 */

require_once ('FoodEstablishment.php');
require_once ('LocalBusiness.php');
require_once ('persistencia.php');

function procesar_put(){

    $request = obtener_request();
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Allow: GET, POST, PUT, DELETE');


    if ($request == null) {
        echo 'PUT: mala info';
    } else if (count($request) == 2) {
        $recibido = file_get_contents("php://input");
        $json_a = json_decode($recibido);
        $vector = obtener_objetos();
        if ($request[0] == 'LocalBusiness') {
           foreach ($vector as $object){
               if($object->id ==$request[1] && $object->type == 'LocalBusiness'){
                   $object->actualizar($json_a);
                   http_response_code(200);
                   exit( "Elemento actualizado LocalBusiness");
               }
           }
           guardar_objetos($vector);
            http_response_code(400);
            exit( "Elemento no ha sido actualizado");
        } else if ($request[0] == 'FoodEstablishment') {
            foreach ($vector as $object){
                if($object->id ==$request[1] && $object->type == 'FoodEstablishment'){
                    $object->actualizar($json_a);
                    http_response_code(200);
                    exit( "Elemento actualizado FoodEstablishment");
                }
            }
            guardar_objetos($vector);
            http_response_code(400);
            exit( "Elemento no ha sido actualizado");
        } else {
            http_response_code(400);
            exit( "Elemento no ha sido actualizado");
        }
    } else {
        http_response_code(400);
        exit( "Ruta no encontrada");
    }
}