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
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Allow: GET, POST, PUT, DELETE');


    if ($request == null) {
        $string = '<section> <h3> Info de entidades </h3>';
        $string = $string. '<p>Hay dos tipos de entidades: </p>';
        $string = $string. '<ul><li>LocalBusiness</li><li>FoodEstablishment</li></ul>';
        $string = $string. '<h3> Entidad LocalBusiness </h3>';
        $string = $string. '<table><thead><tr><th>Atributos</th><th>Descripcion</th><th>Tipo</th></tr></thead><tbody><tr><td>name</td>';
        $string = $string. '<td>Nombre del local</td><td>Texto</td></tr><tr><td>address</td><td>Direccion del local</td><td>Texto</td>';
        $string = $string. '</tr><tr><td>description</td><td>Descripcion del local</td><td>Texto</td></tr><tr><td>telephone</td><td>Telefono del local</td>';
        $string = $string. '<td>Texto</td></tr><tr><td>url</td><td>Url de la web del local</td><td>Texto</td></tr><tr><td>openingHours</td><td>Horas a las que esta abierto el local</td>';
        $string = $string. '<td>Array de Textos</td></tr></tbody></table>';
        $string = $string. '<h3> Entidad FoodEstablishment </h3>';
        $string = $string. '<table><thead><tr><th>Atributos</th><th>Descripcion</th><th>Tipo</th></tr></thead><tbody><tr><td>name</td><td>Nombre del local</td>';
        $string = $string. '<td>Texto</td></tr><tr><td>address</td><td>Direccion del local</td><td>Texto</td></tr><tr><td>description</td><td>Descripcion del local</td>';
        $string = $string. '<td>Texto</td></tr><tr><td>telephone</td><td>Telefono del local</td><td>Texto</td></tr><tr><td>url</td><td>Url de la web del local</td>';
        $string = $string. '<td>Texto</td></tr><tr><td>openingHours</td><td>Horas a las que esta abierto el local</td><td>Array de Textos</td></tr><tr>';
        $string = $string. '<td>acceptsReservations</td><td>Si acepta reservas</td><td>Booleano</td></tr><tr><td>servesCuisine</td><td>Tipos de cocina que sirve</td>';
        $string = $string. '<td>Array de Textos</td></tr></tbody></table>';
        $string = $string. '</section>';
        header("content-type:text/html");
        http_response_code(200);
        exit($string);
    } else if (count($request) == 1) {
        if ($request[0] == 'LocalBusiness') {
            $texto ='';
            $objetos = obtener_objetos();
            foreach ($objetos as $objeto){
                if($objeto->type == 'LocalBusiness') {
                    $texto = $texto.gestion_contenido($objeto);
                }
            }
            exit($texto);
        } else if ($request[0] == 'FoodEstablishment') {
            $texto ='';
            $objetos = obtener_objetos();
            foreach ($objetos as $objeto){
                if($objeto->type == 'FoodEstablishment') {
                    $texto = $texto.gestion_contenido($objeto);
                }
            }
            exit($texto);
        } else {
            http_response_code(400);
            exit( 'GET: Mala info');
        }

    } else if (count($request) == 2) {
        if ($request[0] == 'LocalBusiness') {
            $texto ='';
            $objetos = obtener_objetos();
            foreach ($objetos as $objeto){
                if($objeto->type == 'LocalBusiness' && $request[1] == $objeto->id) {
                    $texto = $texto.gestion_contenido($objeto);
                }
            }
            exit($texto);

        } else if ($request[0] == 'FoodEstablishment') {
            $texto ='';
            $objetos = obtener_objetos();
            foreach ($objetos as $objeto ){
                if($objeto->type == 'FoodEstablishment' && $request[1] == $objeto->id) {
                    $texto = $texto.gestion_contenido($objeto);
                }
            }
            exit($texto);
        } else {
            http_response_code(400);
            exit( 'GET: Mala info');
        }
    } else {
        http_response_code(400);
        exit( "GET: Error demasiados argumentos");
    }

};


function gestion_contenido($objeto){
    $contenido = $_SERVER['HTTP_ACCEPT'];
    if($contenido == 'application/xml'){
        header("content-type:application/xml");
        http_response_code(200);
        return $objeto->toXML();
    }elseif ($contenido == 'application/ld+json'){
        header("content-type:application/ld+json");
        http_response_code(200);
        return $objeto->toJSON();
    }else{
        header("content-type:text/html");
        http_response_code(200);
        return $objeto->toHTML();
    }

}