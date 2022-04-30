<?php
include_once("capaConexion.php");

class capaComentario
{
    //Declaramos las variables públicas de la clase empleados, se corresponderan con los campos de la tabla empleados de la base de datos usuario
	public $id_usuario;
	public $idComentario;
	public $nb_usuario;
    public $idtema;
	public $comentario;
    public $objetoConexion;
    //public $listado;
    
	//Declaro el método constructor de la clase capaUsuarioss al que le pasamos las variables de la propia clase
	public function __construct($idtema,$id_usuario,$idComentario,$comentario)
    {
        $this->id_usuario=$id_usuario;
        $this->idtema=$idtema;
        $this->idComentario=$idComentario;
		$this->comentario=$comentario;
      
        $this->objetoConexion=new capaConexion('mysql:host=localhost;dbname=feddback5','root','');
    }
    
	//Declaro el método insertar en la tabla usuario
	public function insertar()
    {
        try
        {
        	$this->objetoConexion->conectar();
			
           $this->objetoConexion->ejecutar("insert into comentario(idusuario,idtema, comentario) values('$this->id_usuario','$this->idtema', '$this->comentario')");
           
		    
			$this->objetoConexion->desconectar();
			//mail();
			//cerrar sesion
			//encriptar
			
        }
        catch (PDOException $ex)
        {        	
            //Devuelve la excepción en caso de no poder insertar el usuario
			throw $ex;
        }
    }
    
	//Declaro el método eliminar de la tabla usuario
	public function eliminar()
    {
        $this->objetoConexion->conectar();
        $this->objetoConexion->ejecutar("delete from comentario  where idComentario=$this->idComentario ");
        $this->objetoConexion->desconectar();
    }

    public function eliminarByTema()
    {
        $this->objetoConexion->conectar();
       $this->objetoConexion->ejecutar("delete from comentario where idtema=$this->idtema");
        $this->objetoConexion->desconectar();
    }

     
	
	//Declaro el método actualizar en la tabla usuario
	public function actualizar()
    {
        try
        {
            $this->objetoConexion->conectar();
            $this->objetoConexion->ejecutar("update usuario set id_usuario=$this->id_usuario, nb_usuario='$this->nb_usuario',ps_usuario='$this->ps_usuario',mail=$this->mail where id_usuario=$this->id_usuario");
			
            $this->objetoConexion->desconectar();
        }
        catch (PDOException $ex)
        {
            //Devuelve la excepción en caso de no poder insertar el usuario
			throw $ex;
        }
    }
	
	//Declaro el método de consulta para listar usuarios
	public function consultar()
    {
	
	// echo "Llega hasta aquí";
        $this->objetoConexion->conectar();
		
        $rs=$this->objetoConexion->ejecutarConsulta("select c.*,u.nb_usuario from comentario c inner join usuario u on c.idusuario=u.id_usuario inner join tema t on t.idtema=c.idtema where t.idtema=$this->idtema order by fecha desc" );
		// echo ("select * from usuario where nb_usuario='$this->nb_usuario' and ps_usuario='$this->ps_usuario'");
		//Si la consulta devuelve algún registro guarda en las variables de la clase cada campo que devuelve la consulta SQL
		if (count($rs)){
			
			$_SESSION["listadoComentario"]= $rs; 				
		}else{
			$_SESSION["listadoComentario"]= "";
		}
		$this->objetoConexion->desconectar();
					
    }	

	    //Declaro el método de consulta para listar usuarios
	public function consultarComentario()
    {
	
	// echo "Llega hasta aquí";
        $this->objetoConexion->conectar();
		
        $rs=$this->objetoConexion->ejecutarConsulta("select c.*,u.nb_usuario from comentario c inner join usuario u on c.idusuario=u.id_usuario");
		// echo ("select * from usuario where nb_usuario='$this->nb_usuario' and ps_usuario='$this->ps_usuario'");
		//Si la consulta devuelve algún registro guarda en las variables de la clase cada campo que devuelve la consulta SQL
		if (count($rs)){
			session_start();			
			$_SESSION["id_usuario"]= $rs[0]['idusuario']; 
			$_SESSION["tema"]= $rs[0]['tema'];
			$_SESSION["idtema"]= $rs[0]['idtema']; 
		}
			
			$this->objetoConexion->desconectar();
			
	    }	
}


?>