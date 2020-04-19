<?php



if(!$_POST) exit;



function tommus_email_validate($email) { return filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email); }


$name = $_POST['name']; $email = $_POST['email']; 



if(trim($name) == '') {

	exit('<div class="error_message">Attention! You must enter your name.</div>');

} else if(trim($email) == '') {

	exit('<div class="error_message">Attention! Please enter a valid email address.</div>');

} else if(!tommus_email_validate($email)) {

	exit('<div class="error_message">Attention! You have entered an invalid e-mail address.</div>');

} if(get_magic_quotes_gpc()) { $comments = stripslashes($comments); }



$address = 'maciek.fraczek85@gmail.com';



$e_subject = 'You\'ve been contacted by ' . $name . '.';

$e_body = "You have been contacted by $name from your contact form, their additional message is as follows." . "\r\n" . "\r\n";


$e_reply = "You can contact $name via email, $email ";



$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );



$headers = "From: $email" . "\r\n";

$headers .= "Reply-To: $email" . "\r\n";

$headers .= "MIME-Version: 1.0" . "\r\n";

$headers .= "Content-type: text/plain; charset=utf-8" . "\r\n";

$headers .= "Content-Transfer-Encoding: quoted-printable" . "\r\n";



if(mail($address, $e_subject)) { echo "<fieldset><div id='success_page'><h4>Wiadomoœæ zosta³a wys³ana.</h4><p>Dziêkujemy $name, Twoja wiadomoœæ zosta³a do nas przekazana.</p></div></fieldset>"; }