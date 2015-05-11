<html>
<head>
<style type="text/css">
</style>
</head>
<body>
<table width="550" border="1" cellspacing="2" cellpadding="2">
  <tr bgcolor="#eeffee">
    <td>Name</td>
    <td><?=$name;?></td>
  </tr>
   <tr bgcolor="#eeffee">
    <td>Response</td>
    <td><?=$response;?></td>
  </tr>
  <tr bgcolor="#eeeeff">
    <td>Email</td>
    <td><?=$email;?></td>
  </tr>
  <tr bgcolor="#eeffee">
    <td>No. of Guests</td>
    <td><?=$guests;?></td>
  </tr>  
  <tr bgcolor="#eeeeff">
    <td>Message</td>
    <td><?=$message;?></td>
  </tr>
</table>
</body>
</html>
<?
$body = ob_get_contents();

require("phpmailer.php");

$mail = new PHPMailer();

$mail->From     = "andrewandkathrynwedding@gmail.com";// emaill address from your site
$mail->FromName = "RSVP"; // Subject of the mail
$mail->AddAddress("kay.lindenberg@gmail.com","Kay Lindenberg"); // Put your email here

$mail->WordWrap = 50;
$mail->IsHTML(true);

$mail->Subject  =  "Demo Form from Ever After:  Contact form submitted"; 
$mail->Body     =  $body;
$mail->AltBody  =  "This is the text-only body";

if(!$mail->Send()) {
	$recipient = 'kay.lindenberg@gmail.com'; //Put your email here
	$subject = 'Contact form failed';
	$content = $body;	
  mail($recipient, $subject, $content, "From: andrewandkathrynwedding@gmail.com\r\nReply-To: $email\r\nX-Mailer: DT_formmail");
  exit;
}
?>
