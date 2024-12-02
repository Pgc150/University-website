<?php
    // Sanitize and validate user input
    $name = htmlspecialchars(strip_tags($_POST["name"]));
    $visitor_email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $subject = htmlspecialchars(strip_tags($_POST["subject"]));
    $message = htmlspecialchars(strip_tags($_POST["message"]));

    if (!$visitor_email) {
        die("Invalid email format.");
    }

    // Email details
    $email_form = 'learningapir@l.com';
    $email_subject = 'New Form Submission';
    $email_body = "User Name: $name.\n" .
                  "User Email: $visitor_email.\n" .
                  "Subject: $subject.\n" .
                  "User Message: $message.\n";

    $to = 'payalchavhan180@gmail.com';
    $headers = "From: $email_form \r\n";
    $headers .= "Reply-To: $visitor_email \r\n";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        header("Location: contact.html");
        exit();
    } else {
        echo "Failed to send email.";
    }
?>
