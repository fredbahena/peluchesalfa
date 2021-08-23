<?php
    $servername = "mysql.hostinger.com";
    $database = "u950271100_peluches_bd"; 
    $username = "u950271100_peluches_usr";
    $password = "Axel1010";
    $sql = "mysql:host=$servername;dbname=$database;";
    $dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    try { 
    $my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);
    echo "Conexión exitosa";
    } catch (PDOException $error) {
    echo 'Error de conexión: ' . $error->getMessage();
    }

    $nombre = "Fred";
    $apellido_paterno = "Bahena";
    $apellido_materno = "Rodriguez";
    $email = "fred.bahena@gmail.com";
    $telefono_casa = "7291078987";
    $telefono_celular = "7291078987";


    $my_Insert_Statement = $my_Db_Connection->prepare("INSERT INTO u950271100_peluches_bd.pa_descargas_catalogo (nombre, apellido_paterno, email, telefono_celular) VALES (:nombre, :apellido_paterno, :email, :telefono_celular)");

    $my_Insert_Statement->bindParam(:nombre, $nombre);
    $my_Insert_Statement->bindParam(:apellido_paterno, $apellido_paterno);
    $my_Insert_Statement->bindParam(:email, $email);
    $my_Insert_Statement->bindParam(:telefono_celular, $telefono_celular);

    if ($my_Insert_Statement->execute()) {
    echo "Registro insertado exitosamente";
    } else {
    echo "No se puedo crear el registro";
    }

    // Acá se puede realizar otro registro
    $nombre = "Fred Antonio";
    $apellido_paterno = "Bahena";
    $apellido_materno = "";
    $email = "fred.bahena@gmail.com";
    $telefono_casa = "";
    $telefono_celular = "7291078987";

    $my_Insert_Statement->execute();

    if ($my_Insert_Statement->execute()) {
    echo "Registro 2, insertado exitosamente";
    } else {
    echo "No se puedo crear el registro 2";
    }
?>