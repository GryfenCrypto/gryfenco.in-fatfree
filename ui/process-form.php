<?php
$to = "gryfencoin@gmail.com";
$subject = "GryfenCoin News Subscription Request";
$message = "Someone with email " . $_POST['email'];
$message .= " wants to subscribe to GryfenCoin News";
//$message = "Fullname: " . $_POST['fullname'];
//$message .= "<br>Password: " . $_POST['password'];
//$message .= "<br>Company: " . $_POST['company'];
//$message .= "<br>Email: " . $_POST['email'];
//$message .= "<br>Password: " . $_POST['password'];

$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
$headers .= "From: Subscriber " . " <" . $_POST['email'] . ">". "\r\n";

if( mail($to, $subject, $message, $headers) ) {
	echo "ok";
} else {
	echo "error";
}