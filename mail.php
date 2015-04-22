<?php
if ($_POST["submit"]) {
$name = $_POST['InputName'];
$email = $_POST['InputEmail'];
$message = $_POST['InputMessage'];
$formcontent="From: $name \n Message: $message";
$recipient = "root@stockforecast.ga";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You!";
?>