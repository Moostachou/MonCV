<?php
class EmailSender {
    public static function sendEmail($to, $subject, $message, $headers) {
        // Ajoutez ici la logique pour envoyer l'e-mail
        // Par exemple, en utilisant la fonction mail() de PHP
        return mail($to, $subject, $message, $headers);
    }
}
?>