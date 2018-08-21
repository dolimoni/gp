<?php
require 'Mail/class.phpmailer.php';
require 'Mail/class.smtp.php';
require 'Mail/class.pop3.php';

function stringColor($chaine){
    return "<span style='color:#0880A7'>$chaine</span>";
}
/*=================================================================================================
                                       RECEPTION FORMULAIRE POST
==================================================================================================*/
$name = htmlspecialchars(filter_input( INPUT_POST, 'name'));
  if( $name == NULL or $name == FALSE ) // si l'objet fourni est vide, invalide ou égale à la valeur par défaut
  {
   $errors[] = 'Champs <span class="red">Nom</span> est vide.';
  }
$company = htmlspecialchars(filter_input( INPUT_POST, 'company'));
  if( $company == NULL or $company == FALSE ) // si l'objet fourni est vide, invalide ou égale à la valeur par défaut
  {
   $errors[] = 'champs <span class="red">Entreprise</span> est vide.';
  }
$tel = htmlspecialchars(filter_input( INPUT_POST, 'tel'));
  if( $tel == NULL or $tel == FALSE ) // si l'objet fourni est vide, invalide ou égale à la valeur par défaut
  {
   $tel = 'null';
  }
$email = filter_input( INPUT_POST, 'email', FILTER_VALIDATE_EMAIL );
if( $email == NULL ) // si le courriel fourni est vide OU égale à la valeur par défaut
{
    $errors[] = 'Champs <span class="red">Email</span> est vide';
}
elseif( $email == FALSE ) // si le courriel fourni n'est pas valide
{
    $errors[] = '<span class="red">Email</span> n\'est pas valide.';
    $email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL );
}

$comments = filter_input( INPUT_POST, 'message', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_HIGH | FILTER_FLAG_ENCODE_LOW );
if( $comments === NULL or $comments === false or empty( $comments )) 
{
    $errors[] = 'Champs <span class="red">Message</span> est vide.';
}

$email_reception ='contact@gp.ma';
$email_copy = 'm.asmaa1@gmail.com';

$ip = $_SERVER['REMOTE_ADDR']; //IP Address

//$email_copy1 = 'le_webmasteur@gmail.com';
/*================================================================================================
                            INSTANCIATION CLASS PHPMailer
==================================================================================================*/
if(empty($errors)==TRUE){
	$mail = new PHPMailer;
	$mail->From = $email;
	$mail->FromName = 'contact formulaire';
	$mail->addAddress($email_reception);
	$mail->addCC($email_copy);
	$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject = 'contact from';
	$mail->Body    = "<h2 style='border-bottom:solid 1px #CCC;'>Message via Contact Form</h2>
			        Nom 		: ".stringColor($name)."<br/><br/>
			        Entreprise 	: ".stringColor($company)."<br/><br/>
			        Téléphone 	: ".stringColor($tel)."<br/><br/>
			        Email 		: ".stringColor($email)."<br/><br/>
			        Message 	: ".stringColor($comments)."<br/><br/>
			        IP Address 	: ".stringColor($ip)."<br/><br/>";

	if(!$mail->send()) {
     	/*echo '
           votre message ne peut pas être envoyé pour l\'instant, réessayer plus tard !!!
          </div>';
      
     	echo 'Mailer Error: ' . $mail->ErrorInfo;*/
		  echo '<ul class="alert alert-warning">';
		  echo '<li>Erreur envoi message réessayer plus tard !!!</li>';
		  echo '</ul>';
	 }
	 else{
		  echo '<ul class="alert alert-success">';
		  echo '<li>Votre message a été envoyé avec succès</li>';
		  echo '</ul>';
    }

}
else
{
	echo '<ul class="alert alert-warning">';
	foreach($errors as $error){ echo "<li>$error</li>"; }	 
    echo '</ul>'; 
}

?>