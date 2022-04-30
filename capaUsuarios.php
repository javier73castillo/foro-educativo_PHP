<?php
include_once("capaConexion.php");

class capaUsuarios
{
    //Declaramos las variables públicas de la clase empleados, se corresponderan con los campos de la tabla empleados de la base de datos usuario
	public $id_usuario;
	public $nb_usuario;
    public $ps_usuario;
	public $mail;
    public $objetoConexion;
    
	//Declaro el método constructor de la clase capaUsuarioss al que le pasamos las variables de la propia clase
	public function __construct($id_usuario,$nb_usuario,$ps_usuario,$mail)
    {
        $this->id_usuario=$id_usuario;
        $this->nb_usuario=$nb_usuario;
		$this->ps_usuario=$ps_usuario;
        $this->mail=$mail;
        $this->objetoConexion=new capaConexion('mysql:host=localhost;dbname=feddback5','root','');
    }
    
	//Declaro el método insertar en la tabla usuario
	public function insertar()
    {
        try
        {
            $this->objetoConexion->conectar();
			$this->objetoConexion->ejecutar("insert into usuario(id_usuario, nb_usuario,ps_usuario,mail) values('$this->id_usuario','$this->nb_usuario','$this->ps_usuario','$this->mail')");
			$this->objetoConexion->desconectar();
			
			
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
        $this->objetoConexion->ejecutar("delete from usuario where nb_usuario=$this->nb_usuario ");
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
		
        $rs=$this->objetoConexion->ejecutarConsulta("select * from usuario where nb_usuario='$this->nb_usuario' and ps_usuario='$this->ps_usuario'");
		// echo ("select * from usuario where nb_usuario='$this->nb_usuario' and ps_usuario='$this->ps_usuario'");
		//Si la consulta devuelve algún registro guarda en las variables de la clase cada campo que devuelve la consulta SQL
		if (count($rs)){
			$this->nb_usuario=$rs[0]['nb_usuario'];
			$this->ps_usuario=$rs[0]['ps_usuario'];
			$this->mail=$rs[0]['mail'];
			
			session_start();
			$_SESSION["nb_usuario"]= $rs[0]['nb_usuario']; 
			$_SESSION["id_usuario"]= $rs[0]['id_usuario']; 
			
						
		}
			
			$this->objetoConexion->desconectar();
			
	    }	
}
?>