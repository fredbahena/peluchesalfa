<?php

    $errors = 0;
    $msg = '';

    //Read the url
    $url = '../assets/catalogo/peluches_alfa_2021.pdf';

    //Clear the cache
    clearstatcache();

    //Check the file path exists or not
    if(file_exists($url)) {

        //Define header information
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($url).'"');
        header('Content-Length: ' . filesize($url));
        header('Pragma: public');

        //Clear system output buffer
        flush();

        //Read the size of the file
        readfile($url,true);

        //Terminate from the script
        die();
    } else {
        $msg = "El archivo no está cargado";
        die( $msg );
        $errors += 1;
    }

    if( $errors == 0 ) {
   
        $msg = 'OK';
        echo $msg;
        
      } else {
    
        echo $msg;
    
      }

?>