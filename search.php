<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../objects/product.php';
 
// instantiate database and candidatos object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$nombre_oferta = new nombre_oferta($db);
$usuarios=new usuarios($db);
 
// get keywords
$keywords=isset($_GET["s"]) ? $_GET["s"] : "";
 
// query nombre_ofertas
$stmt = $nombre_oferta->search($keywords);
$nombre_oferta = $stmt->rowCount();

// query nombre_ofertas
$stmt = $usuarios->search($keywords);
$usuarios = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $nombre_oferta=array();
    $nombre_oferta["records"]=array();
 

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $OfertaLaboral=array(
            
            "usuarios" => $usuarios,
            "nombre_oferta" => html_entity_decode($nombre_oferta),
            "estado" => $activo,
            "estado" => $inactivo,
            
        );
 
        array_push($nombre_oferta["records"], $usuarios);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show usuarios data
    echo json_encode($usuarios);
    echo json_encode($nombre_oferta);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no products found
    echo json_encode(
        array("message" => "No products found.")
    );
}
?>