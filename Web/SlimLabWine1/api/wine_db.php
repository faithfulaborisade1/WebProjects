<?php
function getWines() {
	if (isset($_GET['sort'])){
		$col=$_GET['sort'];
	}
	else{
		$col="name";
	}
	$query = "SELECT * FROM wine ORDER BY "."$col";
	try {
	global $db;
		$wine = $db->query($query);  
		$wine = $wine->fetchAll(PDO::FETCH_ASSOC);
		header("Content-Type: application/json", true);
		echo '{"wine": ' . json_encode($wine) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function getWine($id) {
	$query = "SELECT * FROM wine WHERE id = '$id'";
    try {
		global $db;
		$wine = $db->query($query);  
		$runner = $wine->fetch(PDO::FETCH_ASSOC);
        header("Content-Type: application/json", true);
        echo json_encode($runner);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function findByName($name) {
$query = "SELECT * FROM wine WHERE UPPER(name) LIKE ". '"%'.$name.'%"'." ORDER BY name";
    try {
		global $db;
		$wine = $db->query($query);  
		$runner = $wine->fetch(PDO::FETCH_ASSOC);
        header("Content-Type: application/json", true);
        echo json_encode($runner);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
?>  