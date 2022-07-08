<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './Contenido/Include/PHPMailer-master/src/Exception.php';
require './Contenido/Include/PHPMailer-master/src/PHPMailer.php';
require './Contenido/Include/PHPMailer-master/src/SMTP.php';
$mail = new PHPMailer();
$mail->isHTML(TRUE);
$mail->Body = 'Gracias por crear una cuenta con nosotros, por favor usa el siguiente botón para verificar su cuenta: ';
/* Set the mail sender. */
$mail->setFrom('genarodavid@gmail.com', 'Darth Vader');

/* Add a recipient. */
$mail->addAddress('genarodavid@gmail.com', 'Emperor');

/* Set the subject. */
$mail->Subject = 'Force';

/* Set the mail message body. */
//$mail->Body = 'There is a great disturbance in the Force.';

/* Finally send the mail. */
if (!$mail->send())
{
   /* PHPMailer error. */
   echo $mail->ErrorInfo;
}
