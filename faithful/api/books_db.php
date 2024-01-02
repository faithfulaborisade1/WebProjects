<?php
function getbooks() {
	$query = "select * FROM booktable ";
	try {
	global $db;
		$books = $db->query($query);  
		$books = $books->fetch(PDO::FETCH_ASSOC);
		header("Content-Type: application/json", true);
		echo '{"book": ' . json_encode($books) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function getbook($title) {
	$query = "SELECT * FROM booktable WHERE title = '$title'";
    try {
		global $db;
		$books = $db->query($query);  
		$book = $books->fetch(PDO::FETCH_ASSOC);
        header("Content-Type: application/json", true);
		echo '{"book": ' . json_encode($books) . '}';
		 
        echo json_encode($book);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }	
}

?>