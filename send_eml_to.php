<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "vladimirkarasek94@gmail.com";
    $email_subject = "Předmět emailu: ";
 
    function died($error) {
        // your error code can go here
        echo "Nalezena chyba v odeslaných údajích. ";
        echo "Chyby: .<br /><br />";
        echo $error."<br /><br />";
        echo "Opravte prosím chyby a zkuste odeslat formálář znovu.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $name = $_POST['name']; // required
    $telephone = $_POST['telephone']; // required
    $email_from = $_POST['email']; // required
    $producttype = $_POST['ptype']; // not required
    $parrottype = $_POST['btype']; // required
    $subject = $_POST['subject']; // not required
    $message = $_POST['comments']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'Zadaná emailová adresa není platná.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'Zadané jméno není správné.<br />';
  }
 
 
  if(strlen($comments) < 2) {
    $error_message .= 'Zpráva byla špatně zadána.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Rekapitulace zprávy:.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Jméno: ".clean_string($name)."\n";
    $email_message .= "Telefon: ".clean_string($telephone)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Typ produktu: ".clean_string($producttype)."\n";
    $email_message .= "Typ papouška: ".clean_string($parrottype)."\n";
    $email_message .= "Předmět: ".clean_string($subject)."\n";
    $email_message .= "Zpráva: ".clean_string($message)."\n";
 
// create email headers
$headers = 'Od: '.$email_from."\r\n".
'Komu: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
echo:"Děkujeme za zprávu, v nejbližší době vás budeme kontaktovat."
 
<?php
 
}
?>