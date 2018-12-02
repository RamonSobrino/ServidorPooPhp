<?php
require_once ('FoodEstablishment.php');
require_once ('LocalBusiness.php');
require_once ('procesarGet.php');
require_once ('procesarPost.php');
require_once ('procesarPut.php');
require_once ('procesarDelete.php');



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

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Allow: GET, POST, PUT, DELETE');

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
