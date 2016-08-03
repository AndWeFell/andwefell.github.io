<?php
// Check for empty fields
if(empty($GET['name'])      ||
   empty($GET['email'])     ||
   empty($GET['phone'])     ||
   empty($GET['message'])   ||
   !filter_var($GET['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($GET['name']));
$email_address = strip_tags(htmlspecialchars($GET['email']));
$phone = strip_tags(htmlspecialchars($GET['phone']));
$message = strip_tags(htmlspecialchars($GET['message']));
   
// Create the email and send the message
$to = 'stephaniejnilles@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: stephaniejnilles@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>