<?php
// Vérifie si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Adresse e-mail de réception
    $receiving_email_address = 'lamirimoustapha@gmail.com';

    // Construit le contenu de l'e-mail
    $email_content = "Nom: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // En-têtes de l'e-mail
    $email_headers = "From: $name <$email>";

    // Inclut la classe EmailSender
    require_once '../assets/vendor/php-email-form/emailsender.php';

    // Envoie l'e-mail
    if (EmailSender::sendEmail($receiving_email_address, $subject, $email_content, $email_headers)) {
        // Succès
        http_response_code(200);
        echo "Merci! Votre message a été envoyé avec succès.";
    } else {
        // Échec de l'envoi
        http_response_code(500);
        echo "Désolé, une erreur est survenue lors de l'envoi de votre message. Veuillez réessayer.";
    }
} else {
    // Message d'erreur si le script est accédé directement
    http_response_code(403);
    echo "Il y a eu un problème avec votre soumission, veuillez réessayer.";
}
?>
