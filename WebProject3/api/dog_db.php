<?php
function getDogs() {
	if (isset($_GET['sort'])){
		$col=$_GET['sort'];
	}
	else{
		$col="name";
	}
	$query = "SELECT * FROM dog ORDER BY "."$col";
	try {
	global $db;
		$dogs = $db->query($query);  
		$dogs = $dogs->fetchAll(PDO::FETCH_ASSOC);
		header("Content-Type: application/json", true);
		echo '{"dogs": ' . json_encode($dogs) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function getDog($id) {
	$query = "SELECT * FROM dog WHERE id = '$id'";
    try {
		global $db;
		$dogs = $db->query($query);  
		$dog = $dogs->fetch(PDO::FETCH_ASSOC);
        header("Content-Type: application/json", true);
        echo json_encode($dog);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function findByName($name) {
$query = "SELECT * FROM dog WHERE UPPER(name) LIKE ". '"%'.$name.'%"'." ORDER BY name";
    try {
		global $db;
		$dogs = $db->query($query);  
		$dog = $dogs->fetch(PDO::FETCH_ASSOC);
        header("Content-Type: application/json", true);
        echo json_encode($dog);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function findByAge($age) {
	$query = "SELECT * FROM dog WHERE UPPER(age) LIKE ". '"%'.$age.'%"'." ORDER BY age";
		try {
			global $db;
			$dogs = $db->query($query);  
			$dog = $dogs->fetch(PDO::FETCH_ASSOC);
			header("Content-Type: application/json", true);
			echo json_encode($dog);
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

function addDog() {
    global $app;
	$request = $app->request();
	$dog = json_decode($request->getBody());
	$name = $dog->name;
	$age = $dog->age;
	$color = $dog->color;
	$maintenance = $dog->maintenance;
	$breed = $dog->breed;
 
	$query= "INSERT INTO dog
                 (name, age, color, maintenance, breed)
              VALUES
                 ('$name', '$age', '$color', '$maintenance', '$breed')";
	try {
		global $db;
		$db->exec($query);
		$dog->id = $db->lastInsertId();
		echo json_encode($dog); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
function deleteDog($id) {
	$query = "DELETE FROM dog WHERE id=$id";
	try {
		global $db;
		$db->exec($query);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function updatedog($id) {
	global $app;
	$request = $app->request();
	$dog = json_decode($request->getBody());
	$name = $dog->name;
	$age = $dog->age;
	$color = $dog->color;
	$maintenance = $dog->maintenance;
	$breed = $dog->breed;	
	$query = "UPDATE dog SET name='$name', age='$age', color='$color', maintenance='$maintenance', breed='$breed'  WHERE id='$id'";
	try {
		global $db;
		 $db->exec($query); 
		 echo json_encode($dog);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

//USERS ACCESS//

function getUsers() {
	if (isset($_GET['sort'])){
		$col=$_GET['sort'];
	}
	else{
		$col="name";
	}
	$query = "SELECT * FROM user ORDER BY "."$col";
	try {
	global $db;
		$users = $db->query($query);  
		$users = $users->fetchAll(PDO::FETCH_ASSOC);
		header("Content-Type: application/json", true);
		echo '{"users": ' . json_encode($users) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessusername() .'}}'; 
	}
}

function getUser($id) {
	$query = "SELECT * FROM user WHERE id = '$id'";
    try {
		global $db;
		$users = $db->query($query);  
		$user = $users->fetch(PDO::FETCH_ASSOC);
        header("Content-Type: application/json", true);
        echo json_encode($user);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessusername() .'}}';
    }
}

// function findByName($name) {
// $query = "SELECT * FROM user WHERE UPPER(name) LIKE ". '"%'.$name.'%"'." ORDER BY name";
//     try {
// 		global $db;
// 		$users = $db->query($query);  
// 		$user = $users->fetch(PDO::FETCH_ASSOC);
//         header("Content-Type: application/json", true);
//         echo json_encode($user);
//     } catch(PDOException $e) {
//         echo '{"error":{"text":'. $e->getMessusername() .'}}';
//     }
// }

function addUser() {
    global $app;
	$request = $app->request();
	$user = json_decode($request->getBody());
	$name = $user->name;
	$username = $user->username;
	$password = $user->password;
 
	$query= "INSERT INTO user
                 (name, username, password)
              VALUES
                 ('$name', '$username', '$password')";
	try {
		global $db;
		$db->exec($query);
		$user->id = $db->lastInsertId();
		echo json_encode($user); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessusername() .'}}'; 
	}
}
function deleteUser($id) {
	$query = "DELETE FROM user WHERE id=$id";
	try {
		global $db;
		$db->exec($query);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessusername() .'}}'; 
	}
}

function updateUser($id) {
	global $app;
	$request = $app->request();
	$user = json_decode($request->getBody());
	$name = $user->name;
	$username = $user->username;
	$password = $user->password;	
	$query = "UPDATE user SET name='$name', username='$username', password='$password'  WHERE id='$id'";
	try {
		global $db;
		 $db->exec($query); 
		 echo json_encode($user);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessusername() .'}}'; 
	}
}


?>
