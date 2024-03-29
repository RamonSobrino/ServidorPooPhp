<?php
/**
 * Created by PhpStorm.
 * User: ramon
 * Date: 28/11/2018
 * Time: 22:43
 */

function procesar_delete(){

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Allow: GET, POST, PUT, DELETE');
    $request = obtener_request();
    if ($request == null) {
        echo 'DELETE: mala info';
    } else if (count($request) == 2) {
        $recibido = file_get_contents("php://input");
        $json_a = json_decode($recibido);
        $vector = obtener_objetos();
        if ($request[0] == 'LocalBusiness') {
            $nuevo =[];
            foreach ($vector as $object){
                if($object->id ==$request[1] && $object->type == 'LocalBusiness'){
                    unset($object);
                }else{
                    $nuevo[] = $object;
                }
            }
            guardar_objetos($nuevo);
            if (count($vector)!=count($nuevo)) {
                http_response_code(200);
                exit("Elemento borrado LocalBusiness");
            }else{
                http_response_code(400);
                exit("Elemento No borrado LocalBusiness");
            }
        } else if ($request[0] == 'FoodEstablishment') {
            $nuevo =[];
            foreach ($vector as $object){
                if($object->id ==$request[1] && $object->type == 'FoodEstablishment'){
                    unset($object);
                }else{
                    $nuevo[] = $object;
                }
            }
            guardar_objetos($nuevo);
            if (count($vector)!=count($nuevo)) {
                http_response_code(200);
                exit("Elemento borrado FoodEstablishment");
            }else{
                http_response_code(400);
                exit("Elemento No borrado FoodEstablishment");
            }
        } else {
            http_response_code(400);
            exit( "Ruta no encontrada");
        }
    } else {
        http_response_code(400);
        exit( "Ruta no encontrada");
    }
}