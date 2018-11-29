<?php
/**
 * Created by PhpStorm.
 * User: RamonSobrinoLlorca
 * Date: 28/11/2018
 * Time: 18:26
 */

require_once ('FoodEstablishment.php');
require_once ('LocalBusiness.php');
require_once ('persistencia.php');

function procesar_get(){

    $request = obtener_request();

    if ($request == null) {
        echo 'GET: Informacion de los tipos de ids';
    } else if (count($request) == 1) {
        if ($request[0] == 'LocalBusiness') {
            $objetos = obtener_objetos();
            echo 'GET: Informacion de los LocalBussines';
            foreach ($objetos as $objeto){
                if($objeto->type == 'LocalBusiness') {
                    gestion_contenido($objeto);
                }
            }
        } else if ($request[0] == 'FoodEstablishment') {
            echo 'GET: Informacion de los FoodEstablishment';
            $objetos = obtener_objetos();
            foreach ($objetos as $objeto){
                if($objeto->type == 'FoodEstablishment') {
                    gestion_contenido($objeto);
                }
            }
        } else {
            echo 'GET: Mala info';
        }

    } else if (count($request) == 2) {
        if ($request[0] == 'LocalBusiness') {
            $objetos = obtener_objetos();
            echo 'GET: Informacion de los LocalBussines';
            foreach ($objetos as $objeto){
                if($objeto->type == 'LocalBusiness' && $request[1] == $objeto->id) {
                    gestion_contenido($objeto);
                }
            }
        } else if ($request[0] == 'FoodEstablishment') {
            echo 'GET: Informacion de los FoodEstablishment';
            $objetos = obtener_objetos();
            foreach ($objetos as $objeto ){
                if($objeto->type == 'FoodEstablishment' && $request[1] == $objeto->id) {
                    gestion_contenido($objeto);
                }
            }
        } else {
            echo 'GET: Mala info';
        }
    } else {
        echo "GET: Error demasiados argumentos";
    }

};


function gestion_contenido($objeto){
    $contenido = $_SERVER['HTTP_ACCEPT'];
    if($contenido == 'application/xml'){
        echo $objeto->toXML();
    }elseif ($contenido == 'application/json'){
        echo $objeto->toJSON();
    }else{
        echo $objeto->toHTML();
    }

}