<?php

  $errors = 0;
  $msg = '';
  
  if( empty($_POST['email']))
  {
    $msg = 'Error: El campo Email es requerido';
    die( $msg );
    $errors += 1;
  }

  $from = $_POST['email']; 
  $to = 'fred.bahena@gmail.com';
  $subject = "Suscripción"; 

  if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $to)) {
    $msg = 'Error: Correo electrónico no válido';
    die( $msg );
    $errors += 1;
  }

  if( $errors == 0 ) {
    
    $email_subject = "Peluches Alfa - $subject :: $from";
    $email_message = "Recibiste una nueva solicitud de suscripción. Aquí los detalles:".
    "\n Email: $from \n Mensaje: \n $message"; 
    
    $headers = "From: $from"; 
        
    mail($to,$email_subject,$email_message,$headers);

    $msg = 'OK';
    echo $msg;
    
  } else {

    echo $msg;

  }
    
?>
