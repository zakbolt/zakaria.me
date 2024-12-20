<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['tel']);
    $company = htmlspecialchars($_POST['company']);
    $service = htmlspecialchars($_POST['service']);
    $message = htmlspecialchars($_POST['message']);
    
    // Email details
    $to = "zakariahossain27@trustedwebagency.com"; // Replace with your email address
    $subject = "New Contact Form Submission";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    // Email body
    $body = "You have received a new message from your website contact form:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Organization: $company\n";
    $body .= "Services Needed: $service\n\n";
    $body .= "Message:\n$message\n";

 // Send the email   
 if (mail($to, $subject, $body, $headers)) {
    header("Location: contact.html?status=success"); // Redirect on success
    exit;
} else {
    header("Location: contact.html?status=error"); // Redirect on failure
    exit;
}
} else {
header("Location: contact.html?status=invalid"); // Redirect if accessed incorrectly
exit;
}
?>
