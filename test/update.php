<?php 
		
require '../vendor/autoload.php';

use TicketSource\SQLAnywhereClient AS PDO;

try {

	$dns = "uid=teste;pwd=teste;ENG=teste;commlinks=tcpip{host=127.0.0.1;port=2638}";
	$con = new PDO( $dns );

} catch (Exception $e) {
	echo $e->getMessage();
}

$sql = "SELECT id FROM usuario WHERE id = 1";

// SQL
$sql = "INSERT INTO usuario (name, email, password, status) VALUES ('Carlos', 'contato@carlosgartner.com.br', '".md5('teste')."', 1) ";
$result = $con->exec($sql);



$con->commit();
	
if ($result)
	echo "Novo registro inserido: " . $con->lastInsertId();
else 
	$con->rollback();