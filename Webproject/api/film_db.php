<?php
function getFilms() {
	if (isset($_GET['sort'])){
		$col=$_GET['sort'];
	}
	else{
		$col="name";
	}
	$query = "SELECT * FROM film ORDER BY "."$col";
	try {
	global $db;
		$films = $db->query($query);  
		$films = $films->fetchAll(PDO::FETCH_ASSOC);
		header("Content-Type: application/json", true);
		echo '{"films": ' . json_encode($films) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function getFilm($id) {
	$query = "SELECT * FROM film WHERE id = '$id'";
    try {
		global $db;
		$films = $db->query($query);  
		$film = $films->fetch(PDO::FETCH_ASSOC);
        header("Content-Type: application/json", true);
        echo json_encode($film);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function findByName($name) {
$query = "SELECT * FROM film WHERE UPPER(name) LIKE ". '"%'.$name.'%"'." ORDER BY name";
    try {
		global $db;
		$films = $db->query($query);  
		$film = $films->fetch(PDO::FETCH_ASSOC);
        header("Content-Type: application/json", true);
        echo json_encode($film);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function findByAge($age) {
	$query = "SELECT * FROM film WHERE UPPER(age) LIKE ". '"%'.$age.'%"'." ORDER BY age";
		try {
			global $db;
			$films = $db->query($query);  
			$film = $films->fetch(PDO::FETCH_ASSOC);
			header("Content-Type: application/json", true);
			echo json_encode($film);
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

function addfilm() {
    global $app;
	$request = $app->request();
	$film = json_decode($request->getBody());
	$name = $film->name;
	$age = $film->age;
	$color = $film->color;
	$maintenace = $film->maintenace;
	$breed = $film->breed;
 
	$query= "INSERT INTO film
                 (name, age, color, maintenace, breed)
              VALUES
                 ('$name', '$age', '$color', '$maintenace', '$breed')";
	try {
		global $db;
		$db->exec($query);
		$film->id = $db->lastInsertId();
		echo json_encode($film); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
function deletefilm($id) {
	$query = "DELETE FROM film WHERE id=:id";
	try {
		global $db;
		$db->exec($query);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function updatefilm($id) {
	global $app;
	$request = $app->request();
	$film = json_decode($request->getBody());
	$name = $film->name;
	$age = $film->age;
	$color = $film->color;
	$maintenace = $film->maintenace;
	$breed = $film->breed;	
	$query = "UPDATE film SET name='$name', age='$age', color='$color', maintenace='$maintenace', breed='$breed',  WHERE id='$id'";
	try {
		global $db;
		 $db->exec($query); 
		 echo json_encode($film);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}


//user data
// function getUsers() {
// 	if (isset($_GET['sort'])){
// 		$col=$_GET['sort'];
// 	}
// 	else{
// 		$col="name";
// 	}
	
// 		$query = "select * FROM user ORDER BY name";
// 		try {
// 		global $db;
// 			$users = $db->query($query);  
// 			$users = $users->fetchAll(PDO::FETCH_ASSOC);
// 			header("Content-Type: application/json", true);
// 			echo '{"user": ' . json_encode($users) . '}';
// 		} catch(PDOException $e) {
// 			echo '{"error":{"text":'. $e->getMessage() .'}}'; 
// 		}
// 	}
	
// 	function getUser($id) {
// 		$query = "SELECT * FROM user WHERE id = '$id'";
// 		try {
// 			global $db;
// 			$users = $db->query($query);  
// 			$user = $users->fetch(PDO::FETCH_ASSOC);
// 			header("Content-Type: application/json", true);
// 			echo json_encode($user);
// 		} catch(PDOException $e) {
// 			echo '{"error":{"text":'. $e->getMessage() .'}}';
// 		}
// 	}
	
// 	function findByName($name) {
// 	$query = "SELECT * FROM user WHERE UPPER(name) LIKE ". '"%'.$name.'%"'." ORDER BY name";
// 		try {
// 			global $db;
// 			$users = $db->query($query);  
// 			$user = $users->fetch(PDO::FETCH_ASSOC);
// 			header("Content-Type: application/json", true);
// 			echo json_encode($user);
// 		} catch(PDOException $e) {
// 			echo '{"error":{"text":'. $e->getMessage() .'}}';
// 		}
// 	}
// 	function adduser() {
// 		global $app;
// 		$request = $app->request();
// 		$user = json_decode($request->getBody());
// 		$name = $user->name;
// 		$username = $user->username;
// 		$password = $user->password;
// 		$picture = $user->picture;
// 		$query= "INSERT INTO user
// 					 (name, username, password, picture)
// 				  VALUES
// 					 ('$name', '$username','$password', '$picture')";
// 		try {
// 			global $db;
// 			$db->exec($query);
// 			$user->id = $db->lastInsertId();
// 			echo json_encode($user); 
// 		} catch(PDOException $e) {
// 			echo '{"error":{"text":'. $e->getMessage() .'}}'; 
// 		}
// 	}
// 	function deleteuser($id) {
// 		$query = "DELETE FROM user WHERE id=:id";
// 		try {
// 			global $db;
// 			$db->exec($query);
// 		} catch(PDOException $e) {
// 			echo '{"error":{"text":'. $e->getMessage() .'}}'; 
// 		}
// 	}
	
// 	function updateuser($id) {
// 		global $app;
// 		$request = $app->request();
// 		$user = json_decode($request->getBody());
// 		$name = $user->name;
// 		$username = $user->username;
// 		$password = $user->password;
// 		$picture = $user->picture;
// 		$query = "UPDATE user SET name='$name', username='$username', password='$password', picture='$picture' WHERE id='$id'";
// 		try {
// 			global $db;
// 			 $db->exec($query); 
// 			 echo json_encode($user);
// 		} catch(PDOException $e) {
// 			echo '{"error":{"text":'. $e->getMessage() .'}}'; 
// 		}
// 	}


?>