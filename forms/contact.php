<?php

  $errors = 0;
  $msg = '';
  
  if(empty($_POST['name'])  || 
    empty($_POST['email']) ||
    empty($_POST['subject']) || 
    empty($_POST['message']))
  {
    $msg = 'Error: Todos los campos son requeridos';
    die( $msg );
    $errors += 1;
  }

  $from = $_POST['email']; 
  $name = $_POST['name']; 
  $to = 'fred.bahena@gmail.com';
  $subject = $_POST['subject']; 
  $message = $_POST['message']; 

  if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $to)) {
    $msg = 'Error: Correo electrónico no válido';
    die( $msg );
    $errors += 1;
  }

  if( $errors == 0 ) {
    
    $email_subject = "Peluches Alfa - Contacto - $subject :: $name";
    $email_message = "Recibiste un nuevo mensaje. Aquí los detalles:".
    "\n Nombre: $name \n Email: $from \n Mensaje: \n $message"; 
    
    $headers = "From: $from"; 
        
    mail($to,$email_subject,$email_message,$headers);

    $msg = 'OK';
    echo $msg;
    
  } else {

    echo $msg;

  }
    
?>
