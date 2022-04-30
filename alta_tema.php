<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title> PE - Educaci�n con TIC</title>
    <META NAME="DC.Language" SCHEME="RFC1766" CONTENT="Spanish">
<META NAME="AUTHOR" CONTENT="Javier Castillo">
<META NAME="REPLY-TO" CONTENT="javier73castillo@hotmail.com">
<LINK REV="made" href="mailto:javier73castillo@hotmail.com">
<META NAME="DESCRIPTION" CONTENT="Este espacio propone estudiar el impacto de las tecnolog�as, los medios y dispositivos de comunicaci�n e Internet, en la sociedad de hoy y en sus modos de relacionarse.">
<META NAME="KEYWORDS" CONTENT="educaci�n, tecnolog�as, TIC, computaci�n, recursos, herramientas">
<META NAME="Resource-type" CONTENT="Index">
<META NAME="DateCreated" CONTENT="Tue, 3 December 2019 00:00:00 GMT+1">
<META NAME="Revisit-after" CONTENT="1 days">
<META NAME="robots" content="ALL"> 

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="contacto/css/style.css" rel="stylesheet">
<link href="contacto/css/nav.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="contacto/imagenes/icono.png"/>

 
<style> 

a.button {
    font-size:14px;
    color:#030303;
    background:#eaeaea;
    text-decoration:none;
    padding: 2px;
    border-radius: 3px;
    border: 1px solid #464343;
    
}


</style>


<script  type="text/javascript">

    alert("El tema se cargo correctamente");
    </script>


</head>

<body>

<?php

include_once("capaTema.php");


try
{
	//Si cargamos la p�gina desde alguna opci�n de los botones entra en el siguiente bucle
    if (!empty($_POST))
    {
        session_start();  
        $id_usuario=  $_SESSION["id_usuario"];

        echo ("usuario:".$id_usuario);

        //Se crea la instancia de la clase capaUsuarios y se llama al m�todo que corresponda.
        $objetoUsuario=new capaTema(0, $id_usuario,$_POST["tema"]);
        if (isset($_POST["insertarTema"] ) )
        {
           
            $objetoUsuario->insertar();
            echo ("Cargo tema");
            header("Location: /listadoDeTemas.php");
            exit;
        }
       
    }
}
catch(PDOException $ex)
{
    $error=$ex->getMessage() ;
}

?>
</html>
