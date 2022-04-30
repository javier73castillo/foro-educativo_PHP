<?php
class capaConexion
{
    //Declado las variables privadas de la clase que se corresponden con los par�metros de conexi�n al servidor
	private $servidor;
    private $user;
    private $password;
	//Declaro la variable objeto de la conexi�n
    private $objetoConexion;
	
	//Declaro el m�todo constructor de la clase, al que le paso las variables de conexi�n al servidor
    public function __construct($servidor,$user,$password)   
    {
        //Establezco el valor de cada variable de la clase al valor que he pasado al contructor al hacer la llamada en el momento de la definici�n de la clase
		$this->servidor=$servidor;
        $this->user=$user;
        $this->password=$password;
    }
	
	//M�todo cpara realizar la conexi�n al servidor.
    public function conectar()
    {
        //Mediante el try intenta realizar lo que se indica entre sus llaves
		try
        {
            //Realizamos la conexi�n mediante la clase PDO (http://php.net/manual/es/class.pdo.php)
			$this->objetoConexion = new PDO($this->servidor,  $this->user ,  $this->password );
            //Establecemos los atributos correspondientes en caso de error (http://php.net/manual/es/pdo.setattribute.php)
			$this->objetoConexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        //En caso de que el try no funcione, declaramos la variable ex de PDOException
		catch(PDOException $ex)
        {
            echo "Problemas al conectar con la base de datos";
        }
    }
    
	//M�todo para finalizar la conexi�n con la base de datos
	public function desconectar()
    {
        //Igualamos a null el objeto conexi�n
		$this->objetoConexion=null;
    }
    
	//M�todo para ejecutar cualquier sentencia SQL que se pase como par�metro de la funci�n
	public function ejecutarConsulta($strComando)
    {
        try
        {
            //La variable ejecutar es un objeto que instancia a la clase objetoConexi�n de la clase capaConexion
			//Prepara la sentencia SQL limpiando de posibles problemas relacionados con injection SQL. (http://php.net/manual/es/pdo.prepare.php)
			$ejecutar=$this->objetoConexion->prepare($strComando); 
            //Ejecuta la sentencia que le pasamos como par�metro strComando. (http://php.net/manual/es/pdostatement.execute.php)
			$ejecutar->execute();
            //Guardamos en la variable row lo que devuelva la funci�n fetchAll, es decir la consulta SQL. (http://php.net/manual/es/pdostatement.fetchall.php)
			$rows = $ejecutar->fetchAll();
            return $rows;
        }
        catch(PDOException $ex)
        {
            //Devuelve la variable ex con la excepci�n que surja
			throw $ex;
        }
    }

    //M�todo para ejecutar cualquier sentencia SQL que se pase como par�metro de la funci�n
    public function ejecutar($strComando)
    {
        try
        {
            //La variable ejecutar es un objeto que instancia a la clase objetoConexi�n de la clase capaConexion
            //Prepara la sentencia SQL limpiando de posibles problemas relacionados con injection SQL. (http://php.net/manual/es/pdo.prepare.php)
            $ejecutar=$this->objetoConexion->prepare($strComando); 
            //Ejecuta la sentencia que le pasamos como par�metro strComando. (http://php.net/manual/es/pdostatement.execute.php)
            $ejecutar->execute();
            //Guardamos en la variable row lo que devuelva la funci�n fetchAll, es decir la consulta SQL. (http://php.net/manual/es/pdostatement.fetchall.php)
           // $rows = $ejecutar->fetchAll();
          //  return $rows;
        }
        catch(PDOException $ex)
        {
            //Devuelve la variable ex con la excepci�n que surja
            throw $ex;
        }
    }
}

?>