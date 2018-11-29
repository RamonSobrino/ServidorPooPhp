<?php
require_once ('FoodEstablishment.php');
require_once ('LocalBusiness.php');
require_once ('procesarGet.php');

//$alumnos = Array();
function obtener_request()
{
    if (isset($_SERVER['PATH_INFO'])) {
        $request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
        //echo $request;

    } else {
        $request = null;
    }
    return $request;
}

echo $_SERVER['HTTP_ACCEPT'];

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        procesar_get();
        break;
    case "PUT":
       procesar_put();
        break;
    case "POST":
        procesar_post();
        break;
    case "DELETE":
        procesar_delete();
        break;
}
