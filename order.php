<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object file
include_once '../config/database.php';
include_once '../objects/product.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare usuario object
$usuario = new Usuario($db);

//prepare nombre_oferta object
$nombre_oferta = new NuevaOferta($db);
 
// get usuario 
$nombre = json_decode(file_get_contents("php://input"));
 
// set usuario to be ordered
$usuario->nombre = $usuario->nombre;

// set nombre_oferta to be ordered
$nombre_oferta->nombre_oferta= $nombre_oferta->nombre_oferta;

// order the usuario
if($usuario->order()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("message" => "usuario was ordered."));
}
 
// if unable to order the nombre_oferta
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("message" => "Unable to order usuario."));
}
if($nombre_oferta->order()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("message" => "nombre_oferta was ordered."));
}
 
// if unable to order the nombre de oferta
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("message" => "Unable to order nombre_oferta."));
}

?>