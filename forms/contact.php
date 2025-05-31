<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'ianportfoliomailer@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include($php_email_form);
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }


  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';
  require 'PHPMailer/src/Exception.php';
  
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  
  $mail = new PHPMailer(true);
  
  try {
      // SMTP Configuration
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'ianportfoliomailer@gmail.com'; 
      $mail->Password = 'Qwerty@11#'; 
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587;
  
      // Email Content
      $mail->setFrom('ianportfoliomailer@gmail.com',  'Ian Portfolio Mailer');
      $mail->addAddress($_POST['email']);
      $mail->Subject = $_POST['subject'];
      $mail->Body = $_POST['message'];
  
      // Send Email
      $mail->send();
      echo "Email sent successfully!";
  } catch (Exception $e) {
      echo "Email could not be sent. Error: {$mail->ErrorInfo}";
  }

