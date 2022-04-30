


<!-- Toda la programaci�n HTML con la clase descargada-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>PE - Educaci�n con TIC</title>
<link href="default.css" rel="stylesheet" type="text/css" media="screen" />
</head>
                        
<body>

<?php

include_once("capaUsuarios.php");

try
{
    //Si cargamos la p�gina desde el boton Consultar ingresa aqui
 
    if (!empty($_POST))
    {
        if (isset($_SESSION ) )
        { 
            $_SESSION=array();
            session_destroy();
        }
    
        
        
        $objetoUsuario=new capaUsuarios($_POST["id_usuario"],$_POST["nb_usuario"],$_POST["ps_usuario"],$_POST["mail"] );
      
        if (isset($_POST["consultar"] ) )
        {
            
            //si existe el usuario, inicia una variable de sesi�n. 
            $objetoUsuario->consultar();
            
                        
            if (isset($_SESSION["nb_usuario"])){
                
                        
                header("Location:eliminarUsuario.php");
            exit;
                
            }
            
            else{
                    echo ("no existe usuario");
                    //header ("location:formlogueo.php");
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


<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="#"><span>Ejemplo</span></a>/</h1>
			<p>Primero ejemplo de POO con PHP</p>
		</div>
	</div>
	<div id="page"><div class="inner_copy"></div>
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
						<h1 class="title"><a href="#">Bienvenido a nuestra web!</a></h1>
						<div class="entry">
                        	<!-- Definici�n del formulario con las opciones de cargar los datos en caso de que hayamos pulsado el boton de consultar-->
                            <form id="searchform" action="eliminarUsuario.php" method="post">
                            
                               <div> Id_Usuario<input type="text" id="id_usuario" name="id_usuario" value="<?php if (isset($_POST["consultar"])) echo $objetoUsuarios->id_usuario; ?>"/></div> 
                                <div> Nombre de Usuario <input type="text" id="nb_usuario" name="nb_usuario"  value="<?php if (isset($_POST["consultar"])) echo $objetoUsuarios->nb_usuario; ?>"/></div>
                                <div> Password <input type="text" id="ps_usuario" name="ps_usuario"  value="<?php if (isset($_POST["consultar"])) echo $objetoUsuarios->ps_usuario; ?>"/></div>
                                <div> E-mail <input type="text" id="mail" name="mail"  value="<?php if (isset($_POST["consultar"])) echo $objetoUsuarios->mail; ?>"/></div>    
                                <div>
                                
                                <input type="submit" id="eliminar" name="eliminar" value="Eliminar" />
                                <input type="submit" id="actualizar" name="actualizar" value="Actualizar" />
                                <input type="submit" id="consultar" name="consultar" value="Consultar" />    
                                </div>
                                
                            </form>
                            
						</div>
                        
					</div>
				</div>
				<div style="clear:both">&nbsp;</div>
			</div>
		</div>
	</div>
</div>
<div id="footer-wrapper">
	<div id="footer"><div class="fleft"><p>Copyright statement.</p></div><div class="fright"><p>Primer programa POO con PHP</p></div><div class="fcenter"><p>Creado por: German Romeo</p></div><div class="fclear"></div></div>
</div>
</body>
</html>