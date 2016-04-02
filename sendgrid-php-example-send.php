<?php
require 'vendor/autoload.php';

require_once 'config.php';


$sendgrid = new SendGrid\Client($sendgrid_api_key, ["turn_off_ssl_verification" => TRUE]);
$email = new SendGrid\Email();
$email->addTo($to)
  ->setFrom($to)
  ->setSubject('[sendgrid-php-example] Pachyderm named %yourname%')
  ->setText('The elephant in the room is blue!')
  ->setHtml('<strong>The %elephant% in the room is blue!</strong>')
  ->addSubstitution('%yourname%', ['Mr. ElePHPant'])
  ->addSubstitution('%elephant%', ['elephant'])
  ->addHeader('X-Sent-Using', 'SendGrid-API')
  ->addHeader('X-Transport', 'web')
  ->addAttachment('./phplogo.gif', 'php.gif');

$response = $sendgrid->send($email);
var_dump($response);
