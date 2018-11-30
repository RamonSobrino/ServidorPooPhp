<?php
/**
 * Created by PhpStorm.
 * User: ramon
 * Date: 28/11/2018
 * Time: 22:43
 */

function procesar_delete(){
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
            echo "Elemento borrado LocalBusiness";
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
            echo "Elemento borrado FoodEstablishment";
        } else {
            echo 'DELETE: Mala info';
        }
    } else {
        echo "DELETE: Error demasiados argumentos";
    }
}