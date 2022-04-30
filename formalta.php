<?php
include_once("capaUsuarios.php");
try
{
	//Si cargamos la página desde alguna opción de los botones entra en el siguiente bucle
    if (!empty($_POST))
    {
        //Se crea la instancia de la clase capaUsuarios y se llama al método insertar.
		$objetoUsuario=new capaUsuarios(0,$_POST["nb_usuario"],$_POST["ps_usuario"],$_POST["mail"] );
        if (isset($_POST["insertar"] ) )
        {
            echo ("entra");
            $objetoUsuario->insertar();
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
<body>
	<header>
		<img src="contacto/imagenes/logo.png" width="100px" height="100px">
		<h1>Portal educativo <br> Para docentes de distintos niveles.</h1> 

  	</header>

<div class="pri">

<h5>Bienvenido al portal educativo. En este espacio se propone estudiar el impacto de las tecnologías, los medios y dispositivos de comunicación e Internet, en la sociedad de hoy y en sus modos de relacionarse. <br><br>
	Las TIC como herramientas eficientes para el tratamiento de la información en la práctica docentes, el consumo y construcción del conocimiento, constituyen recursos estratégicos para la formación de formadores. <p> 

</h5>
</div>
<div class="pri">

<form id="searchform" action="alta_usuario.php" method="post">
	<h4> REGISTRATE GRATIS EN EL PORTAL</h4>
    <table>         
 			<tr>             
 				<td> <p> Usuario </p> </td>             
 				<td> <input type="text" id="nb_eusuario" name="nb_usuario" size="28" maxlength="100"/>  </td>         
 			</tr>         
 			<tr>            
 				<td> <p> Password <p> </td>            
 				 <td> <input type="Password" id="ps_usuario" name="ps_usuario" size="28" maxlength="100"/></td>         

 			</tr>        
 			<tr>            
 				<td> <p> Mail </p></td>             
 				<td> 
 					<input type="email" id="mail" name="mail" size="28" maxlength="100"/>
 				</td>         
 			</tr>         
 			
			<tr>
				<td colspan="2" align="center"> <br><input type="submit" id="insertar" name="insertar" value="Registrarse" /> 
				 
				 <a href="formlogueo.php" class="button">Ingresar al portal</a> </td>
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
<footer>
	<a href ="https://twitter.com/DTE_BA" target="_blank"> <img src="contacto/imagenes/botones/tw.png" width="80" height="80" /></a>
    <a href ="https://www.linkedin.com/in/javier-castillo-1752b044/" target="_blank"><img src="contacto/imagenes/botones/li.png" width="80" height="80" /></a>
    <a href ="https://www.youtube.com/channel/UC2CIS5qTIV1hTfh2dSfBaEQ" target="_blank"><img src="contacto/imagenes/botones/yt.png" width="80" height="80" /></a> <br> <br>
    <h6> educaciontic@portaleducativo.com.ar <br>© 2020 - Junín - BA - Argentina </h6> 
</footer>


</body>
</html>