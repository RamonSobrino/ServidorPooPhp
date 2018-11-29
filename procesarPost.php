<?php
/**
 * Created by PhpStorm.
 * User: ramon
 * Date: 28/11/2018
 * Time: 22:36
 */
require_once ('FoodEstablishment.php');
require_once ('LocalBusiness.php');

function procesar_post()
{
    $request = obtener_request();
    if ($request == null) {
        echo 'POST: mala info';
    } else if (count($request) == 1) {
        if ($request[0] == 'LocalBusiness') {

            $object = file_get_contents("php://input");
            echo $object;
            $json_a = json_decode($object);
            $local = new LocalBusiness($json_a);
            //$local->actualizar($json_a);


            echo $local->toJSON();
        } else if ($request[0] == 'FoodEstablishment') {
            echo 'POST: Informacion de los FoodEstablishment';
        } else {
            echo 'POST: Mala info';
        }

    } else {
        echo "Error demasiados argumentos";
    }
}