<?php

include_once("capaUsuarios.php");


try
{
	//Si cargamos la página desde alguna opción de los botones entra en el siguiente bucle
    if (!empty($_POST))
    {
        //Se crea la instancia de la clase capaEmpleados y se llama al método que corresponda.
		$objetoUsuario=new capaUsuarios(0,1,$_POST["tema"]);
        if (isset($_POST["insertarTema"] ) )
        {
            echo ("Cargo tema");
            $objetoUsuario->insertarTema();
        }
       
    }
}
catch(PDOException $ex)
{
    $error=$ex->getMessage() ;
}




?>


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

<script type="text/javascript">
	

//función para informar al usuario que ingrese comentario y no deje el campo vacio
function valForm(){

	var tem = document.getElementById("tema").value;

	if (tem.trim()!="undefined" && tem.trim() !=""){		
		return true;
	}else{
		alert("Ingrese Tema");
		return false;
	}

}

</script>


<body>

	<header>
		<?php include "header.php" ?>
  	</header> 

  	
<div class="divisor4">





<form id="searchform" action="listadoDeTemas.php" method="post">

								<h4> Registro de Nuevo Tema</h4>
                            
							
								<table align="center">         
 			<tr>             
 				<td> <p> Tema:  </p> </td>             
 				<td> <input type="text" id="tema" name="tema" size="50" maxlength="200"/>  </td>         
 			</tr>         
 			
 			
			<tr>
				<td colspan="2" align="center"> <input type="submit" id="insertarTema" name="insertarTema" value="Guardar" onclick="return valForm();" />

				<a href="listadoDeTemas.php" class="button"> - Volver a ver listado de temas - </a> 
				 
				  </td>
				 
				 
				 

			</tr>	
 		</table>    
                                
                            </form>



</div>


<div class="divisor4">

<h3> Portales educativos con recursos pedagógicos, para incluir herramientas tecnológicas en el proceso de enseñanza aprendizaje. </h3> <br>

<a href="https://www.argentina.gob.ar/ciencia/estudiantes" target="_blank"> <img src="contacto/imagenes/portales/1.png" width="100" height="100" alt="Ministerio argentino de ciencia y tecnología"/></a>
<a href="http://program.ar/" target="_blank"> <img src="contacto/imagenes/portales/2.png" width="100" height="100" alt="Programación educativa"/></a>
<a href="#" target="_blank"> <img src="contacto/imagenes/portales/3.png" width="100" height="100" /></a>
<a href="https://continuemosestudiando.abc.gob.ar/" target="_blank"> <img src="contacto/imagenes/portales/4.png" width="100" height="100" alt="EDUC.AR" /></a>
<a href="http://encuentro.gob.ar/" target="_blank"> <img src="contacto/imagenes/portales/5.png" width="100" height="100" alt="Canal encuentro"/></a>
<a href="https://www.unicef.org/argentina/sites/unicef.org.argentina/files/2018-03/EDUCACION_01_TICS-Educacion-InformeGeneral.pdf
" target="_blank"> <img src="contacto/imagenes/portales/6.png" width="100" height="100" /></a>

<a href="http://escueladeroboticamisiones.edu.ar/" target="_blank"> <img src="contacto/imagenes/portales/7.png" width="100" height="100"  alt="Escuela de robótica"/></a>
<a href="https://educabot.com/" target="_blank"> <img src="contacto/imagenes/portales/8.png" width="100" height="100" alt="Portal de robótica educativa" /></a>
<a href="https://tecnologiaeducativa.abc.gob.ar/" target="_blank"> <img src="contacto/imagenes/portales/9.png" width="100" height="100" alt="Tecnología Educativa Provincia de BA" /></a>
</div>
<footer><a href ="https://twitter.com/DTE_BA" target="_blank"> <img src="contacto/imagenes/botones/tw.png" width="80" height="80" /></a>
        <a href ="https://www.linkedin.com/in/javier-castillo-1752b044/" target="_blank"><img src="contacto/imagenes/botones/li.png" width="80" height="80" /></a>
        <a href ="https://www.youtube.com/channel/UC2CIS5qTIV1hTfh2dSfBaEQ" target="_blank"><img src="contacto/imagenes/botones/yt.png" width="80" height="80" /></a> <br> <br>
        <h6> educaciontic@portaleducativo.com.ar <br>© 2020 - Junín - BA - Argentina </h6> </footer>


</body>
</html>