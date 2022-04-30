<?php

include_once("capaTema.php");
include_once("capaComentario.php");

try
{
	//Si cargamos la página desde alguna opción de los botones entra en el siguiente bucle
    if (!empty($_GET))
    {
        //Se crea la instancia de la clase capaUsuarios y se llama al método que corresponda.	

       
        $idTema= $_GET["idTema"];	
        $objetoTema=new capaTema($idTema, 0,0);   
        $objetoTema->consultarTema();  
        $id_usuario=$_SESSION["id_usuario"];
        $objetoComentario=new capaComentario($_GET["idTema"], $id_usuario,"",0);
        $objetoComentario->consultar();

    }
}
catch(PDOException $ex)
{
    $error=$ex->getMessage() ;
}
?>
<header>
		<?php include "header.php" ?>
  	</header>
<body>

	<div class="pri">


			<h4> 
			Tema:
			<?php
			echo($_SESSION["tema"]);
			?>
		</h4>
		</div>
	<div class="divisor4">	
                          
<br>
<table border= "1" align="center" cellpadding="12" > 

<tr>
<td> 

<h4> COMENTARIOS </h4>

</td> 

<td> 

<h4> USUARIO </h4>
</td> 

<td> 

<h4> FECHA </h4>
</td> 

 </tr>

 <?php

 	if (isset($_SESSION["listadoComentario"]) && $_SESSION["listadoComentario"] != "")
 	{
 		foreach($_SESSION["listadoComentario"] as $val){
                echo "<tr><td>".$val['comentario']."</td><td>".$val['nb_usuario']."</td><td>".$val['fecha']."</td></tr>";
            }
 	}
 	else

 	{

 		echo ("Este tema no tiene comentarios");
 	}


?>


</table>

<script type="text/javascript">
	


function valForm(){

	var com = document.getElementById("comentario").value;

	if (com.trim()!="undefined" && com.trim() !=""){		
		return true;
	}else{
		alert("Ingrese comentario");
		return false;
	}

}

</script>

<div class="divisor4">

<form id="searchform" action="altaComentario.php" method="post">
	<br><br>
	<table align="center" cellpadding="2">         	
			<input type="hidden" id="idTema" name="idTema" value="<?php echo $idTema; ?>"/> 
 			<tr>             
 				<td> <p> Ingrese Comentario </p> </td>             
 				<td> <input type="text" id="comentario" name="comentario" size="100" maxlength="300"/>  </td>         
 			</tr>         
 			
 			
			<tr>
				<td colspan="2" align="center"> <input type="submit" id="insertarComentario" name="insertarComentario" value="Guardar" onclick="return valForm();" /> 
					<a href="listadoDeTemas.php" class="button"> - Volver a ver listado de temas - </a>
				 
				  </td>
				 
				 
				 

			</tr>	
 		</table>    
                                
</form>

</div>

</div>




</body>
</html>