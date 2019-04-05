<?php
$a=0;
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
console.log($name);
$formcontent="From: $name \n Message: $message";
$recipient = "jossmoff@hotmail.co.uk";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
//header("Location: index.html");
echo "Thank You!";
?>