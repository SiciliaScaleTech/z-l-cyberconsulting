<?php include "header.php" ?>

<?php
// Traitement du formulaire quand l'utilisateur soumet
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = "zl.cyberconsulting.formation@gmail.com"; // ton e-mail
    $subject = "Nouveau message depuis le site";
    $body = "Nom : $nom\nEmail : $email\n\nMessage :\n$message";
    $headers = "From: $email";

    // Validation de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "L'adresse e-mail n'est pas valide.";
    } else {
        // Envoi de l'e-mail
        if (mail($to, $subject, $body, $headers)) {
            $success = "Votre message a bien été envoyé !";
        } else {
            $error = "Une erreur est survenue. Veuillez réessayer.";
        }
    }
}
?>
    <main class="principal_contact">
            
                <h1 class="formulaire">Formulaire de contact</h1>
                <?php if (!empty($success)) : ?>
                    <div class="message success"><?php echo $success; ?></div>
                <?php endif; ?>

                <?php if (!empty($error)) : ?>
                    <div class="message error"><?php echo $error; ?></div>
                <?php endif; ?>
                
        <div class="forme_du_formulaire">
            <form action="contact.php" method="post">
                <ul>
                    <li class="case_formulaire">
                        <label for="name">Nom&nbsp;:</label>
                        <input type="text" id="name" name="nom" required/>
                    </li>
                    <li class="case_formulaire">
                        <label for="mail">E-mail&nbsp;:</label>
                        <input type="email" id="mail" name="email" required />
                    </li>
                    <li class="case_formulaire">
                        <label for="msg">Message&nbsp;:</label>
                        <textarea id="msg" name="message" required class="case_formulaire_msg"></textarea>
                    </li>
                </ul>

                <div class="contact-mail">
                    <button type="submit" class="bouton-contact">Envoyer</button>
                </div>
            </form>
        </div>            
        
        <div class="contacter">
            <h2>Coordonnées</h2>
                <div class="contact-item">
                    <img src="images/contact/tel.png" height="20px" width="auto" class="icone_contact"><span> 06.10.47.75.07</span><br>
                    <img src="images/contact/mail.png" height="20px" width="auto" class="icone_contact"><span><a href="mailto:zl.cyberconsulting.formation@gmail.com">zl.cyberconsulting.formation@gmail.com</a></span>
                </div>
            </div>      
    </main>
     
<?php include "footer.php" ?>
    
