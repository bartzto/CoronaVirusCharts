<?php
$email_from = "contact@tobiasbartz.tech";   
$sendermail_antwort = true;      
$name_von_emailfeld = "Email";   
 
$empfaenger = "tobias.bartz@online.de"; 
$mail_cc = "hello@tobiasbartz.tech"; 
$betreff = "Eine neue Nachricht: Kontaktformular [CoronaVirusCharts]"; 
 
$url_ok = "https://tobiasbartz.tech/CoronaSite"; 
$url_fehler = "https://tobiasbartz.tech/CoronaSite"; 

$ignore_fields = array('submit');
 
$msg = "Du hast eine neue Nachricht über das Kontaktforumlar erhalten. \nDas wichtigste in kürze:\n--------------------------------------------------------\n";

foreach($_POST as $name => $value) {
   if (in_array($name, $ignore_fields)) {
        continue; 
   }
   $msg .= "Info: $name \n$value\n\n";
}
 
if ($sendermail_antwort and isset($_POST[$name_von_emailfeld]) and filter_var($_POST[$name_von_emailfeld], FILTER_VALIDATE_EMAIL)) {
   $email_from = $_POST[$name_von_emailfeld];
}
 
$header="From: $email_from";
 
if (!empty($mail_cc)) {
   $header .= "\n";
   $header .= "Cc: $mail_cc";
}
 
$header .= "\nContent-type: text/plain; charset=utf-8";
 
$mail_senden = mail($empfaenger,$betreff,$msg,$header);
 
 
if($mail_senden){
  header("Location: ".$url_ok);
  exit();
} else{
  header("Location: ".$url_fehler);
  exit();
}