<?php
// après configuration du serveur mail MailHog et l'installation de PHPMailer
//j'importe les classes 
use PHPMailer\PHPMailer\PHPMailer;

// use PHPMailer\PHPMailer\src\SMTP;


// require_once 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once 'vendor/autoload.php';


// On envoie le mail dans un block try/catch pour capturer les éventuelles erreurs
// if ($mail) {
try {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Récupérer l'adresse e-mail saisie par l'utilisateur
        $userEmail = $_POST['email'];
        $message = $_POST['message'];

        //Création d'une instance PHPMailer
        $mail = new PHPMailer(true);

        //configuration
        //Pour avoir des informations de debug
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

        // Configuration de SMTP
        $mail->isSMTP();
        $mail->Host = "localhost";
        $mail->Port = 1025;    // port SMTP (MailHog)

        //charset
        $mail->CharSet = "utf8";
        // On désactive l'authentification SMTP
        // $mail->SMTPAuth   = false;

        //DESTINATAIRES
        $mail->addAddress($userEmail);
        // Destinataire(s) - adresse et nom (facultatif)
        // $mail->addAddress("client2@example.com");
        //Adresse de reply (facultatif)
        // $mail->addReplyTo("reply@thedistrict.com", "Reply");

        //CC(copie) & BCC(copie cachée)
        //pour avoir une copie
        // $mail->addCC("cc@example.com");
        // $mail->addBCC("bcc@example.com");

        // EXPEDITEUR
        $mail->setFrom('from@thedistrict.com', 'The District Company');

        //CONTENU
        // On précise si l'on veut envoyer un email sous format HTML 
        //attention si le destinataire ne peut pas lire le html 
        // $mail->isHTML(true);

        // Sujet du mail
        $mail->Subject = 'Confirmation de votre commande';
        // Corps du message
        $mail->Body = "On teste l'envoi de mails avec PHPMailer et du texte accentué dans le sujet du mail !";


        // On ajoute la/les pièce(s) jointe(s)
        // $mail->addAttachment('/path/to/file.pdf');

        // J'envoie 
        $mail->send();
        echo "Email envoyé avec succès";
    }
} catch (Exception $e) {
    echo "L'envoi de mail a échoué. L'erreur suivante s'est produite : ", $mail->ErrorInfo;
}
