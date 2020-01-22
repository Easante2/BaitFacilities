<?php
$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}

// Phone
if (empty($_POST["company_name"])) {
    $errorMSG = "Phone is required ";
} else {
    $company_name = $_POST["company_name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}


// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required";
} else {
	$body = nl2br($_POST["message"]);


    
}

require 'PHPMailerAutoload.php';
$mail = new PHPMailer;

$mail->isSMTP();                                     
$mail->Host = 'send.one.com';  
$mail->SMTPAuth = true;                             
$mail->Username = 'mailer@baitfm.co.uk';                
$mail->Password = 'FMmailer';                          
$mail->SMTPSecure = 'ssl';                            
$mail->Port = 465;                                  

$mail->setFrom("mailer@baitfm.co.uk"); 
$mail->addAddress("mailer@baitfm.co.uk");     
$mail->isHTML(true);                        

$mail->Subject = "New Message Received" ;

$mail->Body .= "Name: ";
$mail->Body .= $name;
$mail->Body .= "<br><br>";
$mail->Body .= "Email: ";
$mail->Body .= $email;
$mail->Body .= "<br><br>";
$mail->Body .= "Company Name: ";
$mail->Body .= $company_name;
$mail->Body .= "<br><br>";
$mail->Body .= "Message: <br>";
$mail->Body .= $body;
$mail->Body .= "<br>";


$mail->AltBody = $body;

if(!$mail->send()) {
    echo 'Message could not be sent.';
} else {
    echo 'success';
}