<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["naam"];
    $email = $_POST["email"];
    $bedrijf = $_POST["bedrijf"];
    $tel = $_POST["tel"];
    $txt = $_POST["txt"];

    $to = "088681@glr.nl";

    $subject = "Contact Form verzonden door: $name";

    $email_body = "Naam: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "bedrijf: $bedrijf\n";
    $email_body .= "tel-nmr: $tel\n";
    $email_body .= "Bericht: $txt";

    if (mail($to, $subject, $email_body)) {
        echo "Thank you for your submission!";
    } else {
        echo "An error occurred. Please try again later.";
    }

    header('Location: ../pages/bedankt.php');
}
?>