<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> PE - Educación con TIC</title>
	<META NAME="DC.Language" SCHEME="RFC1766" CONTENT="Spanish">
<META NAME="AUTHOR" CONTENT="Javier Castillo">
<META NAME="REPLY-TO" CONTENT="javier73castillo@hotmail.com">
<LINK REV="made" href="mailto:javier73castillo@hotmail.com">
<META NAME="DESCRIPTION" CONTENT="Este espacio propone estudiar el impacto de las tecnologías, los medios y dispositivos de comunicación e Internet, en la sociedad de hoy y en sus modos de relacionarse.">
<META NAME="KEYWORDS" CONTENT="educación, tecnologías, TIC, computación, recursos, herramientas">
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





</head>
<body>
<?php

include_once("capaUsuarios.php");


try
{
	//Si cargamos la página desde el boton Consultar ingresa aqui
    



    if (!empty($_POST))
    {
    	if (isset($_SESSION ) )
        { 
        	$_SESSION=array();
        	session_destroy();
        }
	
        
		//encripta la contraseña
		$str = md5($_POST["ps_usuario"]);
       	$objetoUsuario=new capaUsuarios(0,$_POST["nb_usuario"],$str,"xxx" );
      
        if (isset($_POST["consultar"] ) )
        {
			
            //si existe el usuario, inicia una variable de sesión. 
			$objetoUsuario->consultar();
			
						
			if (isset($_SESSION["nb_usuario"])){
				
						
				header("Location:listadoDeTemas.php");
            exit;
            	
			}
			
			else{
					header ("location:formlogueo.php");
			}
           
        }
		
		else
		{
		// si no existe el usuario vuelve a la pagina para cargar nuevamente los datos del usuario
		header ("location:formlogueo.php");
		
		}
		
					
    }
}
catch(PDOException $ex)
{
    $error=$ex->getMessage() ;
}




?>






</html>