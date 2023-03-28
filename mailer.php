<?php
require_once 'vendor/autoload.php';
try {

  // Create the SMTP Transport (TLS)
  $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
      ->setUsername(getenv('MAIL_AUTH_USERNAME'))
      ->setPassword(getenv('MAIL_AUTH_PASSWORD'));

  // Create the Mailer using your created Transport
  $mailer = new Swift_Mailer($transport);

  // Create a message
  $message = new Swift_Message();

  // Setting email content
  $message->setSubject(getenv('MAIL_MSG_TITLE'));
  $message->setBody(getenv('MAIL_MSG_BODY_TEXT'));
  $message->addPart(getenv('MAIL_MSG_BODY_HTML'), 'text/html');

  // Setting from and recipient addresses
  //$message->setFrom(['from_sender@gmail.com' => 'Mail Title']);
  //$message->addTo('to_recieiver@gmail.com','reciever name');
  //$message->addCc('recipient@gmail.com', 'recipient name');
  //$message->addBcc('recipient@gmail.com', 'recipient name');
  //
  $message->setFrom([getenv('MAIL_FROM') => getenv('MAIL_FROM_NAME')]);
  $message->addTo(getenv('MAIL_TO'), getenv('MAIL_TO_NAME'));

  // Attaching files
  $attachment = Swift_Attachment::fromPath('_attachments/mailer.txt');
  //$attachment->setFilename('_attachments/mailer.xls');
  $message->attach($attachment);

  $inline_attachment = Swift_Image::fromPath('_attachments/mailer.png');
  $message->embed($inline_attachment);

  // Sending the message
  $mailer->send($message);
  //echo "Message successfully sent";
  echo "Message successfully sent" . PHP_EOL;
} catch (Exception $e) {
  //echo "Message could not be sent. Error: ".$e->getMessage();
  echo "Message could not be sent. Error: " . $e->getMessage() . PHP_EOL;
}
