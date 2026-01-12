<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

error_log("inside script");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    error_log("inside post");

    // Display the content of the $_POST array for debugging
    error_log("POST data: " . json_encode($_POST));

    $name       = @trim(stripslashes($_POST['name'])); 
    $from       = @trim(stripslashes($_POST['email'])); 
    $message    = @trim(stripslashes($_POST['message'])); 
    $phone    = @trim(stripslashes($_POST['phone']));
    $subject    = 'Inquiry';
    $to         = 'pranav.nerurkar@utkarshminds.com'; // Replace with your email

    $headers   = array();
    
    // Ensure that email address headers are protected against header injection.
    if (!preg_match("/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $from)) {
        error_log("fail - invalid email address");
        echo "Error: Invalid Email Address.";
        exit;
    }
    
    // Concatenate the phone number with the message
    $message .= "\nPhone: " . $phone;
    
    $headers[] = "MIME-Version: 1.0";
    $headers[] = "Content-type: text/plain; charset=iso-8859-1";
    $headers[] = "From: {$name} <{$from}>";
    $headers[] = "Reply-To: <{$from}>";
    $headers[] = "X-Mailer: PHP/" . phpversion();
    
    $headerString = implode("\r\n", $headers);
    $mail_success = mail($to, $subject, $message, $headerString);

    

    if ($mail_success) {
        error_log("success");
        echo "Your message has been sent successfully!";
    } else {
        error_log("fail");
        echo "Error: Unable to send the message. Please try again later.";
    }
}else {
    // If request method is not POST, log that information
    error_log("NOT a POST request, method used: " . $_SERVER["REQUEST_METHOD"]);
    
    
}
?>
