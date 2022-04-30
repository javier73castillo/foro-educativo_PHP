<?php

include_once("capaUsuarios.php");


try
{
	//Si cargamos la página desde alguna opción de los botones entra en el siguiente bucle
    if (!empty($_POST))
    {
        //Se crea la instancia de la clase capaEmpleados y se llama al método que corresponda.
		$objetoUsuario=new capaUsuarios($_POST["id_usuario"],$_POST["nb_usuario"],$_POST["ps_usuario"],$_POST["mail"] );
        if (isset($_POST["insertar"] ) )
        {
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
<link href="css/style.css" rel="stylesheet">
<link href="css/nav.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="imagenes/icono.png"/>


<script type="text/javascript">         

function validarEntero(valor) {             
//intento convertir a entero.              
//si era un entero no le afecta, si no lo era lo intenta convertir              
	valor = parseInt(valor) 
 
            //Compruebo si es un valor numérico              
    if (isNaN(valor)) {                 //entonces (no es numero) devuelvo el valor cadena vacia                  
    return ""             
    } 
    else 
    {                 //En caso contrario (Si era un número) devuelvo el valor                  
    	return valor            
    	 }        
    } 
 
function validacion() 
{             //validamos el nombre              
	if (document.fvalida.nombre.value.length == 0) 
		{alert("Tiene que escribir su nombre") document.fvalida.nombre.focus()  return 0; } 
 
            //valido la edad. tiene que ser entero mayor que 18              
    edad = document.fvalida.edad.value             
    edad = validarEntero(edad)            
    document.fvalida.edad.value = edad             
    if (edad == "") 
     	{alert("Tiene que introducir un número entero en su edad.") document.fvalida.edad.focus() return 0;} 

     else 

     	{ if (edad < 18) 
     		{alert("Debe ser mayor de 18 años.") document.fvalida.edad.focus()                    
     		 return 0; }             
     	} 
        //valido el interés              
    if (document.fvalida.interes.selectedIndex == 0){alert("Debe seleccionar un motivo de su contacto.") document.fvalida.interes.focus() return 0; } 
             //el formulario se envia              
    alert("Muchas gracias por enviar el formulario"); document.fvalida.submit();}


function limita(elEvento, maximoCaracteres) 
		{var elemento = document.getElementById("texto"); 
		// Obtener la tecla pulsada              
            var evento = elEvento || window.event;             
            var codigoCaracter = evento.charCode || evento.keyCode;             
            // Permitir utilizar las teclas con flecha horizontal             
            if (codigoCaracter == 37 || codigoCaracter == 39) 
            	{return true;} 
 
            // Permitir borrar con la tecla Backspace y con la tecla Supr.             
            if (codigoCaracter == 8 || codigoCaracter == 46) 
            	{return true;}             
            else 
            	if (elemento.value.length >= maximoCaracteres) 
            		{return false; }             
            		else {return true;}         
            	} 
 
        function actualizaInfo(maximoCaracteres) {             

        	var elemento = document.getElementById("texto");             
        	var info = document.getElementById("info"); 
 
            if (elemento.value.length >= maximoCaracteres) {info.innerHTML = "Máximo " + maximoCaracteres + " caracteres";}            

        else { info.innerHTML = "Puedes escribir hasta " + (maximoCaracteres - elemento.value.length) + " caracteres adicionales"; }         
		}       

</script> 
</head>
<body>

	<header>
		<img src="imagenes/logo.png" width="100px" height="100px">
		<h1>Portal educativo <br> Para docentes de distintos niveles.</h1> 

  	</header>

<div class="pri">


<h5>Bienvenido al portal educativo. En este espacio se propone estudiar el impacto de las tecnologías, los medios y dispositivos de comunicación e Internet, en la sociedad de hoy y en sus modos de relacionarse. <br><br>
	Las TIC como herramientas eficientes para el tratamiento de la información en la práctica docentes, el consumo y construcción del conocimiento, constituyen recursos estratégicos para la formación de formadores. <p> 

</h5>
</div>
<div class="pri">


<form id="searchform" action="alta_usuario.php" method="post">

								<h4> REGISTRESE GRATIS!</h4>
                            
                                
                                <div> Usuario <input type="text" id="nb_eusuario" name="nb_usuario"/></div>
                                <div> Password <input type="text" id="ps_usuario" name="ps_usuario"/></div>
                                <div> Mail <input type="text" id="mail" name="mail" /></div>    
                                <div>
                                <input type="submit" id="insertar" name="insertar" value="Insertar" />
                                    
                                </div>
                                
                            </form>



</div>

<div class="divisor4">

<h3> Portales educativos con recursos pedagógicos, para incluir herramientas tecnológicas en el proceso de enseñanza aprendizaje. </h3> <br>

<a href="https://www.argentina.gob.ar/ciencia/estudiantes" target="_blank"> <img src="imagenes/portales/1.png" width="100" height="100" alt="Ministerio argentino de ciencia y tecnología"/></a>
<a href="http://program.ar/" target="_blank"> <img src="imagenes/portales/2.png" width="100" height="100" alt="Programación educativa"/></a>
<a href="#" target="_blank"> <img src="imagenes/portales/3.png" width="100" height="100" /></a>
<a href="https://continuemosestudiando.abc.gob.ar/" target="_blank"> <img src="imagenes/portales/4.png" width="100" height="100" alt="EDUC.AR" /></a>
<a href="http://encuentro.gob.ar/" target="_blank"> <img src="imagenes/portales/5.png" width="100" height="100" alt="Canal encuentro"/></a>
<a href="https://www.unicef.org/argentina/sites/unicef.org.argentina/files/2018-03/EDUCACION_01_TICS-Educacion-InformeGeneral.pdf
" target="_blank"> <img src="imagenes/portales/6.png" width="100" height="100" /></a>

<a href="http://escueladeroboticamisiones.edu.ar/" target="_blank"> <img src="imagenes/portales/7.png" width="100" height="100"  alt="Escuela de robótica"/></a>
<a href="https://educabot.com/" target="_blank"> <img src="imagenes/portales/8.png" width="100" height="100" alt="Portal de robótica educativa" /></a>
<a href="https://tecnologiaeducativa.abc.gob.ar/" target="_blank"> <img src="imagenes/portales/9.png" width="100" height="100" alt="Tecnología Educativa Provincia de BA" /></a>
</div>
<footer><a href ="https://twitter.com/DTE_BA" target="_blank"> <img src="imagenes/botones/tw.png" width="80" height="80" /></a>
        <a href ="https://www.linkedin.com/in/javier-castillo-1752b044/" target="_blank"><img src="imagenes/botones/li.png" width="80" height="80" /></a>
        <a href ="https://www.youtube.com/channel/UC2CIS5qTIV1hTfh2dSfBaEQ" target="_blank"><img src="imagenes/botones/yt.png" width="80" height="80" /></a> <br> <br>
        <h6> educaciontic@portaleducativo.com.ar <br>© 2020 - Junín - BA - Argentina </h6> </footer>


</body>
</html>