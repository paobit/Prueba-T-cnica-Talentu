<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';
  
// instantiate database and usuarios object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$usuarios = new usuarios($db);
  
// query usuarios
$stmt = $usuarios->read();
$us= $stmt->rowCount();
  
// check if more than 0 record found
if($us>0){
  
    // usuarios array
    $usuarios_arr=array();
    $usuarios_arr["records"]=array();
  
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
  
        $usuarios=array(
            "nombre" => $usuarios,
            "correo" => $correo,
            "tipo_documento" => html_entity_decode($tipo_documento),
            "numero_documento" => html_entity_decode($numero_documento),
        );
  
        array_push($nombre["records"], $nombre);

    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show usuarios data in json format
    echo json_encode($usuarios_arr);
} else {
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no usuarios found
    echo json_encode(
        array("message" => "No usuarios found.")
    );
}