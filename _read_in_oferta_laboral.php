<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/usuarios.php';
include_once '../objects/oferta_laboral.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare oferta_laboral object
$oferta_laboral = new Oferta_laboral($db);
 
// set nombre_oferta property of record to read
$oferta_laboral->nombre_oferta = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of oferta_laboral to be edited
$oferta_laboral->readOne();
 
if($oferta_laboral->nombre_oferta!=null){
    // create array
    $oferta_laboral_arr = array(
        "nombre_oferta" =>  $oferta_laboral->nombre_oferta,
        "usuarios" => $oferta_laboral->nombre_oferta,
        "estado" => $oferta_laboral->nombre_oferta->activo,
        "estado" => $oferta_laboral->nombre_oferta->inactivo,
 
    );
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($oferta_laboral_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user oferta_laboral does not exist
    echo json_encode(array("message" => "oferta_laboral does not exist."));
}
?>