<?php

header("Content-Type: application/json; charset=UTF-8");

require_once('includes/connect.php');

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$errors = [];

$name = trim($name);
$email = trim($email);
$message = trim($message);

if(empty($name)) { $errors['name'] = 'Please complete the name field'; }

if(empty($email)) { $errors['email'] = 'Please complete the email field'; }
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Please provide a valid email';
}

if(empty($message)) { $errors['message'] = 'Please complete the message field'; }

if(empty($errors)) {
    $query = "INSERT INTO contact(name, email, message) VALUES(?, ?, ?)";
    
    $stmt = $connection->prepare($query);

    $stmt->bindParam(1, $name, PDO::PARAM_STR);
    $stmt->bindParam(2, $email, PDO::PARAM_STR);
    $stmt->bindParam(3, $message, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo json_encode(array("message" => "Your message was sent!"));
    }

    $stmt = null;
}

else {
    echo json_encode(array("errors" => array_values($errors)));
}

?>

