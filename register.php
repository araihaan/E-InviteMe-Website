<?php
// Hubungkan ke database MySQL
$databaseHost = 'localhost';
$databaseName = 'e_inviteme';
$databaseUsername = 'root';
$databasePassword = '';

$conn = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Tangkap data dari formulir
$nama_mempelai = $_POST['nama_mempelai'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$whatsapp = $_POST['whatsapp'];

// Check if passwords match
if ($password !== $password_confirm) {
    echo "<script>alert('Password dan Konfirmasi Tidak Sama !');</script>";
    echo "<script>window.location = 'register.html';</script>";
    exit;
} else {
// Hash the password for security (you should use a better hashing method in production)
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
// Insert data into the database
$sql = "INSERT INTO users (nama_mempelai, nama, email, password, whatsapp) VALUES ('$nama_mempelai', '$nama', '$email', '$hashedPassword', '$whatsapp')";
}

if ($conn->query($sql) === TRUE) {
    // Registration successful
    echo "<script>alert('Berhasil Registrasi !');</script>";
    echo "<script>window.location = 'login.html';</script>";
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

// Close the database connection
$conn->close();

?>
