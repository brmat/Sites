<?php 
$nom=$HTTP_POST_VARS['nom']; 
$mail=$HTTP_POST_VARS['mail']; 
$objet=$HTTP_POST_VARS['objet']; 
$message=$HTTP_POST_VARS['message']; 

/////voici la version Mine 
$headers = "MIME-Version: 1.0\r\n"; 

//////ici on d�termine le mail en format text 
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n"; 

////ici on d�termine l'expediteur et l'adresse de r�ponse 
$headers .= "From: $nom <$mail>\r\nReply-to : $nom <$mail>\nX-Mailer:PHP"; 

$subject="$objet"; 
$destinataire="webmaster@votre-site.com"; //remplacez "webmaster@votre-site.com" par votre adresse e-mail
$body="$message"; 
if (mail($destinataire,$subject,$body,$headers)) { 
echo "Votre mail a �t� envoy�<br>"; 
} else { 
echo "Une erreur s'est produite"; 
} 
?></p>
<p align="center">Vous allez bientot etre redirig� vers la page d'acceuil<br>
Si vous n'etes pas redirig� au bout de 5 secondes cliquez <a href="http://www.votre-site.com">ici 
</a></p>