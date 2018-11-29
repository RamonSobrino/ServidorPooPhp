<?php
/**
 * Created by PhpStorm.
 * User: ramon
 * Date: 28/11/2018
 * Time: 22:48
 */

function obtener_objetos(){
    $string = file_get_contents("Objetos.json");
    $json_a = json_decode($string);
    $vector = array();

    foreach ($json_a as $object){
        $vars_clase = get_object_vars($object);

        $tipo = null;
        foreach ($vars_clase as $nombre => $valor) {
            if($nombre == '@type'){
               $tipo = $valor;
            }
        }
        if($tipo== 'LocalBusiness'){
            echo 'localBussines';
           $vector[] = new LocalBusiness($object);
        }elseif ($tipo == 'FoodEstablishment'){
            echo 'FoodEstablishment';
            $vector[] = new FoodEstablishment($object);
        }else{
            echo 'Error';
        }
    }
    return $vector;
}


/**
 * JSON-encodes (with unescaped slashes) the given stdClass or array.
 *
 * @param mixed $input the native PHP stdClass or array which will be
 *          converted to JSON by json_encode().
 * @param int $options the options to use.
 *          [JSON_PRETTY_PRINT] pretty print.
 * @param int $depth the maximum depth to use.
 *
 * @return false|string
 */
function jsonld_encode($input, $options=0, $depth=512) {
    // newer PHP has a flag to avoid escaped '/'
    if(defined('JSON_UNESCAPED_SLASHES')) {
        return json_encode($input, JSON_UNESCAPED_SLASHES | $options, $depth);
    }
    // use a simple string replacement of '\/' to '/'.
    return str_replace('\\/', '/', json_encode($input, $options, $depth));
}