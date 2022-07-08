<?php
header('Content-Type: application/json');
$pdo=new PDO("mysql:dbname=sistemacomer_riego;host=mysql-sistemcomer.alwaysdata.net","274093_riego","americanCLASSIC29*");
switch($_GET['q']){
		// Buscar Último Dato
		case 1:
		    $statement=$pdo->prepare("SELECT humedadR, temperatura, humedadS FROM lectura ORDER BY id_lectura DESC LIMIT 0,1");
			$statement->execute();
			$results=$statement->fetchAll(PDO::FETCH_ASSOC);
			$json=json_encode($results);
			echo $json;
		break; 
		// Buscar Todos los datos
		default:
			
			$statement=$pdo->prepare("SELECT humedadR, temperatura, humedadS FROM lectura ORDER BY id_lectura ASC");
			$statement->execute();
			$results=$statement->fetchAll(PDO::FETCH_ASSOC);
			$json=json_encode($results);
			echo $json;
		break;

}
?>