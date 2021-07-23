<?php

    $errors = 0;
    $msg = '';

    //Read the url
    $fileName = basename('peluches_alfa_2021.pdf');
    $url = '../assets/catalogo/'.$fileName;

    //Clear the cache
    clearstatcache();

    //Check the file path exists or not
    if(!empty($fileName) && file_exists($url)) {

        // Define headers
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/pdf");
        header("Content-Transfer-Encoding: binary");

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