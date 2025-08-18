<?php
// Enable error reporting (for debugging; remove in production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $name = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : '';
    $phone = isset($_POST['phone']) ? strip_tags(trim($_POST['phone'])) : '';
    $email = isset($_POST['email']) ? strip_tags(trim($_POST['email'])) : '';
    $service = isset($_POST['service']) ? strip_tags(trim($_POST['service'])) : '';
    $message = isset($_POST['message']) ? strip_tags(trim($_POST['message'])) : '';
    $emergency = isset($_POST['emergency']) ? 'Yes' : 'No';

    // Basic validation
    if (empty($name) || empty($phone) || empty($service)) {
        echo "error";
        exit;
    }

    // Email settings
    $to = "justrepairserviceshyd@gmail.com"; // Your receiving email
    $subject = "New Service Request from $name";
    $body = "You have received a new service request:\n\n";
    $body .= "Name: $name\n";
    $body .= "Phone: $phone\n";
    $body .= "Email: $email\n";
    $body .= "Service Needed: $service\n";
    $body .= "Emergency: $emergency\n";
    $body .= "Message:\n$message\n";

    $headers = "From: hello@justrepairservices.in\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>
