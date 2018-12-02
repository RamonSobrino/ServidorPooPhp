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
               }
           }
           guardar_objetos($vector);
            echo "Elemento actualizado LocalBusiness";
        } else if ($request[0] == 'FoodEstablishment') {
            foreach ($vector as $object){
                if($object->id ==$request[1] && $object->type == 'FoodEstablishment'){
                    $object->actualizar($json_a);
                }
            }
            guardar_objetos($vector);
            echo "Elemento actualizado FoodEstablishment";
        } else {
            echo 'PUT: Mala info';
        }
    } else {
        echo "Error demasiados argumentos";
    }
}