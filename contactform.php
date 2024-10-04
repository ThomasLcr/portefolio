<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    /*$nom = filter_var($nom, FILTER_SANITIZE_STRING);*/
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Destinataire de l'e-mail
    $destinataire = "thomaslacroix54@hotmail.com";

    // Sujet de l'e-mail
    $sujet = "Formulaire de contact de mon site";

    // Construire le corps de l'e-mail
    $contenu = "Nom: $nom\n";
    $contenu .= "Email: $email\n";
    $contenu .= "Message: $message\n";

    // Entêtes de l'e-mail
    $entetes = "From: $nom <$email>" . "\r\n";
    $entetes .= "Reply-To: $email" . "\r\n";
    // Envoyer l'e-mail
    /* if (filter_var($email, FILTER_VALIDATE_EMAIL)&& mail($destinataire, $sujet, $contenu, $entetes) ) {       
        header("Location: contact-send.html");
    } else {                                                Version avec chargement d'une nouvelle page
        header("Location: contact-error.html");
    } */
    mail($destinataire, $sujet, $contenu, $entetes);
    // On retoune un message de confirmation
    echo "Votre message a bien été envoyé.";
}
?>