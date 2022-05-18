<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';
  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$oferta_laboral = new Oferta_laboral($db);
  
// query products
$stmt = $oferta_laboral->readInStock();
$ol = $stmt->rowCount();
  
// check if more than 0 record found
if($ol>0){
  
    // products array
    $oferta_laboral_arr=array();
    $oferta_laboral["records"]=array();
  

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
  
        $oferta_laboral=array(
            "nombre_oferta" => $nombre_oferta,
            "usuario" => $usuario,
            "estado" => html_entity_decode($activo),
            "estado" => html_entity_decode($inactivo),
            
        );
  
        array_push($nombre_oferta["records"], $nombre_oferta);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show products data in json format
    echo json_encode($products_arr);
} else {
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no products found
    echo json_encode(
        array("message" => "No products found.")
    );
}