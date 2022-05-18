<?php
class Usuarios{
  
    // database connection and table name
    private $conn;
    private $table_name = "candidatos";
  
    // object candidatos
    public $correo;
    public $nombre;
    public $tipo_documento;
    public $numero_documento;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }


    // read candidatos
function readInCandidatos(){
  
    // select all query
    $query = "SELECT c.nombre as nombre, p.correo, p.nombre, p.tipo_documento, p.numero_documento  FROM " . $this->table_name . " p 
                LEFT JOIN candidatos c ON p.nombre = c.nombre
                RIGHT JOIN candidatos s ON p.candidatos = s.candidatos
                ORDER BY
                p.created DESC";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}
function read(){

    // select all query
    $query = "SELECT c.nombre as nombre, p.correo, p.nombre, p.tipo_documento, p.numero_documento FROM    " . $this->table_name . " p 
                LEFT JOIN candidatos c ON p.candidatos = c.candidatos
                LEFT JOIN candidatos s ON p.nombre = s.nombre
                ORDER BY
                p.created DESC";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}
// create candidatos
function create(){
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                nombre=:nombre, correo=:correo, tipo_documento=:tipo_documento, numero_documento=:numero_documento;
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->nombre=htmlspecialchars(strip_tags($this->nombre));
    $this->correo=htmlspecialchars(strip_tags($this->correo));
    $this->tipo_documento=htmlspecialchars(strip_tags($this->tipo_documento));
    $this->numero_documento=htmlspecialchars(strip_tags($this->numero_documento));
    
 
    // bind values
    $stmt->bindParam(":nombre", $this->nombre);
    $stmt->bindParam(":correo", $this->correo);
    $stmt->bindParam(":tipo_documento", $this->tipo_documento);
    $stmt->bindParam(":numero_documento", $this->numero_documento);
    
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}

// used when filling up the update candidatos form
function readOne (){
 
    // query to read single record
    $query = "SELECT
                c.nombre as nombre, p.correo, p.tipo_documento, p.numero_documento
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    Candidatos
                        ON p.nombre = c.nombre
            WHERE
                p.id = ?
            LIMIT
                0,1";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind id of candidatos to be updated
    $stmt->bindParam(1, $this->id);
 
    // execute query
    $stmt->execute();
 
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // set values to object properties
    $this->nombre = $row['name'];
    $this->correo = $row['correo'];
    $this->tipo_documento = $row['tipo_documento'];
    $this->numero_documento = $row['numero_documento'];
}





// used when filling up the update candidatos form
function readOne (){
 
    // query to read single record
    $query = "SELECT
                c.nombre as nombre, p.correo, p.tipo_documento, p.numero_documento
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.nombre = c.nombre
            WHERE
                p.id = ?
            LIMIT
                0,1";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind id of candidatos to be updated
    $stmt->bindParam(1, $this->id);
 
    // execute query
    $stmt->execute();
 
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // set values to object properties
    $this->nombre = $row['name'];
    $this->correo = $row['correo'];
    $this->tipo_documento = $row['tipo_documento'];
    $this->numero_documento = $row['numero_documento'];
}


class OfertaLaboral{
  
    // database connection and table name
    private $conn;
    private $table_name = "OfertaLaboral";
  
    // object OfertaLaboral
    public $nombre_oferta;
    public $usuarios;
    public $estado;
    
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }


    // read OfertaLaboral
function readInOfertaaboral(){
  
    // select all query
    $query = "SELECT c.usuarios as nombre_oferta FROM " . $this->table_name . " p 
                LEFT JOIN  c ON p.usuarios
                 = c.id
                RIGHT JOIN nombre_oferta s ON p.usuarios= s.usuarios
                ORDER BY
                p.created DESC";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}
function read(){

    // select all query
    $query = "SELECT c.usuarios as nombre_oferta FROM    " . $this->table_name . " p 
                LEFT JOIN nombre_oferta c ON p.usuarios = c.usuarios
                LEFT JOIN nombre_oferta s ON p.usuarios = s.usuarios
                ORDER BY
                p.created DESC";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}

    
// create OfertaLaboral
function create(){
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                nombre_oferta=:nombre_oferta, usuarios=:usuarios, estado=:activo, estado=:inactivo;
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->nombre_oferta=htmlspecialchars(strip_tags($this->nombre_oferta));
    $this->usuarios=htmlspecialchars(strip_tags($this->usuarios));
    $this->estado=htmlspecialchars(strip_tags($this->estado->inactivo));
    $this->estado=htmlspecialchars(strip_tags($this->estado->activo));
    
 
    // bind values
    $stmt->bindParam(":nombre_oferta", $this->nombre_oferta);
    $stmt->bindParam(":usuarios", $this->usuarios);
    $stmt->bindParam(":estado", $this->estado->inactivo);
    $stmt->bindParam(":estado", $this->estado->activo);
    
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}



// search candidatos
function search($keywords){
 
    // select all query
    $query = "SELECT
                c.nombre_oferta as nombre, p.usuario
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.nombre_oferta = c.usuarios
            WHERE
                p.nombre_oferta LIKE ? OR p.usuarios LIKE ? OR c.nombre_oferta LIKE ?
            ORDER BY
                p.created DESC";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $keywords=htmlspecialchars(strip_tags($keywords));
    $keywords = "%{$keywords}%";
 
    // bind
    $stmt->bindParam(1, $keywords);
    $stmt->bindParam(2, $keywords);
    $stmt->bindParam(3, $keywords);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}

// delete the product
function order(){
 
    // get order count from id
    $query = "SELECT p.id,s.id as stockid, s.count as count 
    FROM " . $this->table_name . " p 
    RIGHT JOIN nombre_oferta s ON p.usuarios = s.usuarios
    where p.nombre_oferta = ?";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
 
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
 
    // execute query
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $count = $row['count'];

    if($count <= 0){
        //ordering can not happen
        return false;

    } else {
        $count--;
        $query = "update `nombre_oferta` set count = ? where usuarios= ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $count);
        $stmt->bindParam(2, $this->nombre_oferta);

        if($stmt->execute()){
            return true;
        }
        return false;
    }


?>