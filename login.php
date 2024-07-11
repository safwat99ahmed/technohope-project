<?php
session_start();
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database_name";

// الاتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"));

$user = $data->username;
$pass = $data->password;

$sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
    $_SESSION['user'] = $user_data;  // حفظ بيانات المستخدم في جلسة

    echo json_encode(array(
        "status" => "success",
        "user" => $user_data
    ));
} else {
    echo json_encode(array(
        "status" => "error",
        "message" => "Invalid credentials"
    ));
}

$conn->close();
?>
