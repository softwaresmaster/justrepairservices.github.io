<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "justrepairserviceshyd@gmail.com";
    $subject = "New Newsletter Subscriber";
    $message = "Email: " . $_POST['email'];
    $headers = "From: hello@justrepairservices.in";
    
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for subscribing!";
    } else {
        echo "Error sending subscription.";
    }
}
?>