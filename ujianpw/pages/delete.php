<?php
include 'dbconnect.php';

$id = $_GET['id'];

$sql = "DELETE FROM mahasiswa WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: datamhs.php");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
