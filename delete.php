
<?php


include_once("capaTema.php");
include_once("capaComentario.php");


try
{
	//Si cargamos la página desde el boton Consultar ingresa aqui
    
    
    
    //Se crea la instancia de la clase capaUsuarios y se llama al método que corresponda.
    
    if (isset($_GET["idtema"] ) )
    {
		$objetoComentario=new capaComentario($_GET["idtema"],0,0,"");   
        $objetoComentario->eliminarByTema();	    	
    	$objetoTema=new capaTema($_GET["idtema"],0,"");   
        $objetoTema->eliminar();
        header("Location: listadoDeTemas.php");                
    }else{
		//Se crea la instancia de la clase capaUsuario y se llama al método consultar.
		header("Location: listadoDeTemas.php");
    }
								
			
}
catch(PDOException $ex)
{	
    $error=$ex->getMessage() ;   
}



?>