<?php
    
function conectar(){
    // set up the connection variables
    $db_name  = 'scada';
    $hostname = 'localhost';
    // $username = 'comdatos';
    // $password = 'password';
    $username = 'root';
    $password ='';
    // connect to the database
    return new PDO("mysql:host=$hostname;dbname=$db_name", $username, $password);
    // a query get all the records from the users table
}


function leerEstado(){
    $sql = 'SELECT  DisSetEst, DisSetTem, DisEst FROM  Dispositivo';
    // use prepared statements, even if not strictly required is good practice
    $dbh = conectar();
    $stmt = $dbh->prepare( $sql );

    // execute the query
    $stmt->execute();

    // fetch the results into an array
    $result = $stmt->fetchAll( PDO::FETCH_ASSOC );

    // convert to json
    $json = json_encode( $result );

    $dbh= null;
    // echo the json string
    return  $json;
}

function select($tabla){
	$sql = 'SELECT *  FROM '. $tabla;
    // use prepared statements, even if not strictly required is good practice
	$dbh = conectar();
    $stmt = $dbh->prepare( $sql );

    // execute the query
    $stmt->execute();

    // fetch the results into an array
    $result = $stmt->fetchAll( PDO::FETCH_ASSOC );

    // convert to json
    $json = json_encode( $result );

    $dbh= null;
    // echo the json string
  	return  $json;
}

function getEstado($id,$estado,$temperatura){
    $conn = conectar();
    $sql = "UPDATE Dispositivo SET DisGetEst=:estado, DisGetTem=:temperatura WHERE ( DisCod = :id)";
    $q = $conn->prepare($sql);
    $q->execute(array(':estado'=>$estado,':temperatura'=>$temperatura,':id'=>$id));
}
function setEstado($id,$estado,$temperatura){
    $conn = conectar();
    $sql = "UPDATE Dispositivo SET DisSetEst=:estado, DisSetTem=:temperatura WHERE ( DisCod = :id)";
    $q = $conn->prepare($sql);
    $q->execute(array(':estado'=>$estado,':temperatura'=>$temperatura,':id'=>$id));
}
function setManualActivo($id,$setEstado){
    $conn = conectar();
    $sql = "UPDATE Dispositivo SET DisEst=:estado WHERE DisCod = :id";
    $q = $conn->prepare($sql);
    $q->execute(array(':estado'=>$setEstado,':id'=>$id));
}
?>
