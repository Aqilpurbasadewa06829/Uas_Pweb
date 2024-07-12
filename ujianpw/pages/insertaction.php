<?php
include 'dbconnect.php'; // Pastikan path ini benar dan db.php berisi koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $program_studi = $_POST['program_studi'];

    // Lakukan query ke database untuk menyimpan data
    $sql = "INSERT INTO mahasiswa (nim, nama, jenis_kelamin, alamat, program_studi) VALUES ('$nim', '$nama', '$jenis_kelamin', '$alamat', '$program_studi')";

    if ($conn->query($sql) === TRUE) {
        header("Location: datamhs.php");
        // Redirect to a different page or display a success message
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
