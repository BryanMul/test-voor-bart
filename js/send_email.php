<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $reason = htmlspecialchars($_POST['reason']);
    $message = htmlspecialchars($_POST['message']);

    // Email details
    $to = "karel.merool1@gmail.com"; // Replace with your email address
    $subject = "New Contact Form Submission";
    $body = "
        <h1>New Contact Form Submission</h1>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Reason:</strong> $reason</p>
        <p><strong>Message:</strong><br>$message</p>
    ";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<h1>Bedankt, $name! Je bericht is verzonden.</h1>";
    } else {
        echo "<h1>Sorry iets is verkeerd gegaan, probeer het nogmaals.</h1>";
    }
} else {
    echo "<h1>Invalid Request</h1>";
}
?>