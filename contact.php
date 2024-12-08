<?php
require_once('includes/connect.php');

$name = $_POST['full_name'];
$email = $_POST['email'];
$message = $_POST['msg'];
$errors = [];

$name = trim($name);
$email = trim($email);
$message = trim($message);

if(empty($name)) { $errors[] = 'Please complete the name field'; }

if(empty($email)) { $errors[] = 'Please complete the email field'; }
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please provide a valid email';
}

if(empty($message)) { $errors[] = 'Please complete the message field'; }

if(empty($errors)) {
    $query2 = "INSERT INTO contact (name, email, message) VALUES('$name','$email','$message')";

    if(mysqli_query($connect, $query2)) {
    $to = 'jenifer.quelali.evangelista@gmail.com';
    $subject = 'Your Portfolio has received a new message.';

    $message = "You have received a new contact form submission:\n\n";
    $message .= "Name: ".$name."\n";
    $message .= "Email: ".$email."\n\n";

    mail($to, $subject, $message);
    header('Location: index.php');
    
    }
}

else {
    for($i=0; $i < count($errors); $i++) { echo $errors[$i].'<br>'; }
}

?>