<?php
include 'database.php';
if(count($_POST)>0){
	if($_POST['type']==1){
		$naam = $_POST['naam'];
		$achternaam = $_POST['achternaam'];
		$telefoonnummer = $_POST['telefoonnummer'];
		$sql = "INSERT INTO `contacten`( `naam`, `achternaam`,`telefoonnummer`) VALUES ('$naam','$achternaam','$telefoonnummer')";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==2){
		$id = $_POST['id'];
		$naam = $_POST['naam'];
		$achternaam = $_POST['achternaam'];
		$telefoonnummer = $_POST['telefoonnummer'];
		$sql = "UPDATE `contacten` SET `naam`='$naam',`achternaam`='$achternaam',`telefoonnummer`='$telefoonnummer' WHERE id=$id";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==3){
		$id = $_POST['id'];
		$sql = "DELETE FROM `contacten` WHERE id=$id ";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==4){
		$id = $_POST['id'];
		$sql = "DELETE FROM contacten WHERE id in ($id)";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

?>