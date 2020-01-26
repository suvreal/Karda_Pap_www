<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>Odesláno|Domů</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="css/general.css"/>
 <link rel="stylesheet" type="text/css" href="css/navigation.css"/>
 <link rel="stylesheet" type="text/css" href="css/sections.css"/>
 <link rel="stylesheet" type="text/css" href="css/w3/slider.css"/>
 <link rel="stylesheet" type="text/css" href="css/w3/gallery.css"/>
 <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
 <script src="script/effect.js"></script>
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
 <link rel="shortcut icon" href="pict/icons/small_logo_transparent_xxsmall.png" />
 <style>
   body, html{
    text-align: center;
   }
    
 </style>
</head>

<?php

if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "info@nestropa.cz";
 
    function died($error) {
        // your error code can go here
        echo "Nalezena chyba v odeslaných údajích. ";
        echo $error."<br /><br />";
        echo "Opravte prosím chyby a zkuste odeslat formulář znovu.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['email']) ||
        !isset($_POST['ptype']) ||
        !isset($_POST['btype']) ||
        !isset($_POST['subject']) ||
        !isset($_POST['comments'])){  
        died('Vyplňte prosím všechny položky formuláře.');       
    }
 
     
 
    $name = $_POST['name']; // required
    $telephone = $_POST['telephone']; // required
    $email_from = $_POST['email']; // required
    $producttype = $_POST['ptype']; // not required
    $parrottype = $_POST['btype']; // required
    $subject = $_POST['subject']; // not required
    $message = $_POST['comments']; // required
    
    /*
    $error_message = "";
    //$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    $email_exp = '/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-\.\-\Ä\ä\Ö\ö\Ü\ü\]+(?:\.[a-zA-Z0-9-\.\-\Ä\ä\Ö\ö\Ü\ü\]+)*$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'Zadaná emailová adresa není platná.<br />';
  }
 
    $string_exp = "/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-\.\-\Ä\ä\Ö\ö\Ü\ü\]+(?:\.[a-zA-Z0-9-\.\-\Ä\ä\Ö\ö\Ü\ü\]+)*$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'Zadané jméno není správné.<br />';
  }
 
 
  if(strlen($message) < 2) {
    $error_message .= 'Zpráva byla špatně zadána.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
*/
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
 
    $email_message .= "Jméno: ".clean_string($name)."\n";
    $email_message .= "Telefon: ".clean_string($telephone)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Typ produktu: ".clean_string($producttype)."\n";
    $email_message .= "Typ papouška: ".clean_string($parrottype)."\n";
    $email_subject .= "Předmět: ".clean_string($subject)."\n";
    $email_message .= "Zpráva: ".clean_string($message)."\n";
 
// create email headers
$headers = 'Od: '.$email_from."\r\n".'Komu: '.$email_to."\r\n" .'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->

<img id="contLogoSolo"  src="pict/icons/logo/Logo_NSP_sm.png" />
<h1>Vaše zpráva byla odeslána.</h1>
<h2>Děkujeme za zprávu, v nejbližší době vás budeme kontaktovat.</h2>
<div id="button" style="text-align:center;margin:auto;"><a href="./index.html">Zpět na hlavní stránku</a></div>

</body>
</html>
 
<?php
 
}
?>