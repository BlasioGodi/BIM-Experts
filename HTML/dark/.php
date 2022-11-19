<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$company = $_POST['company'];
$message = $_POST['message'];

//Database connection
$conn = new mysqli('localhost','root','','userdetails');
if($conn->connect_error){
    die('Connection failed: '.$conn->connect_error);
}else {
    $stmt = $conn->prepare("Insert into registration(name,email,phone,company,message
        values(?,?,?,?,?)");
    $stmt->bind_param("sssssi",$name,$email,$phone,$company,$message);
    $stmt->execute();
    echo "Registration successful";
    $stmt->close();
    $conn->close();
}
?>