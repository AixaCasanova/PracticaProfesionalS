<?php
require_once"AccesoDatos.php";
class usuario
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	public $id_user;
	public $nombre;
	public $apellido;
	public $direccion;
	public $mail;
	public $telefono;
	public $tipo;
	public $password;
	public $estado;
	public $sucursal;

		
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
  	public function Getid_user()
	{
		return $this->id_user;
	}
	
	public function Setid_user($valor)
	{
		$this->id_user = $valor;
	}
	public function Getnombre()
	{
		return $this->nombre;
	}
	
	public function Setnombre($valor)
	{
		$this->nombre = $valor;
	}
	public function Getapellido()
	{
		return $this->apellido;
	}
	
	public function Setapellido($valor)
	{
		$this->apellido = $valor;
	}
	
	public function Getdireccion()
	{
		return $this->direccion;
	}
	
	public function Setdireccion($valor)
	{
		$this->direccion = $valor;
	}

	public function Getmail()
	{
		return $this->mail;
	}
	
	public function Setmail($valor)
	{
		$this->mail = $valor;
	}

	public function Gettelefono()
	{
		return $this->telefono;
	}
	
	public function Settelefono($valor)
	{
		$this->telefono = $valor;
	}

	public function Gettipo()
	{
		return $this->tipo;
	}
	
	public function Settipo($valor)
	{
		$this->tipo = $valor;
	}

	public function Getpassword()
	{
		return $this->password;
	}
	
	public function Setpassword($valor)
	{
		$this->password = $valor;
	}
	
	public function Getestado()
	{
		return $this->estado;
	}
	
	public function Setestado($valor)
	{
		$this->estado = $valor;
	}
	
	public function Getsucursal()
	{
		return $this->sucursal;
	}
	
	public function Setsucursal($valor)
	{
		$this->sucursal = $valor;
	}
//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct()
	{
			
		
	}

//--------------------------------------------------------------------------------//
//--TOSTRING	
  	public function ToString()
	{
	  return $this->id_user."-".$this->nombre."-".$this->apellido."-".$this->direccion."-".$this->mail."-".$this->telefono."-".$this->tipo."-".$this->mail."-".$this->telefono."-".$this->tipo."-".$this->estado."-".$this->sucursal."-".$this->password;

	}
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODO DE CLASE
	public static function TraerUnusuario($mail) 
	{	


		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from misusuarios where correo =:mail");
		
		$consulta->bindValue(':mail', $mail, PDO::PARAM_INT);
		$consulta->execute();
		$mailBuscado= $consulta->fetchObject('usuario');
		return $mailBuscado;	
					
	}
	
	public static function TraerTodosLosusuarios()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from misusuarios");
 
		$consulta->execute();			
		$arrusuario= $consulta->fetchAll(PDO::FETCH_CLASS, "usuario");	
		return $arrusuario;
	}
	
	public static function Borrarusuario($mail,$id_user,$tipo)
	{	
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("delete from misusuarios WHERE correo=:mail and id=:id_user and tipo=:tipo");
		$consulta->bindValue(':mail',$mail, PDO::PARAM_INT);	
		$consulta->bindValue(':id_user',$id_user, PDO::PARAM_INT);	
		$consulta->bindValue(':tipo',$tipo, PDO::PARAM_INT);
		$consulta->execute();
		return $consulta->rowCount();
		
	}
	
		public static function TraerTodosLosempleados()
	 {
	  $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	  $consulta =$objetoAccesoDato->RetornarConsulta("select * from misusuarios where tipo='vendedor'");

	  $consulta->execute();   
	  $arrusuario= $consulta->fetchAll(PDO::FETCH_CLASS, "usuario"); 
	  return $arrusuario;
	 }

	public static function TraerTodosLosencargados()
	 {
	  $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	  $consulta =$objetoAccesoDato->RetornarConsulta("select * from misusuarios where tipo='EN'");

	  $consulta->execute();   
	  $arrusuario= $consulta->fetchAll(PDO::FETCH_CLASS, "usuario"); 
	  return $arrusuario;
	 }


	  public static function TraerTodosLosclientes()
	 {
	  $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	  $consulta =$objetoAccesoDato->RetornarConsulta("select * from misusuarios where tipo='comprador'");

	  $consulta->execute();   
	  $arrusuario= $consulta->fetchAll(PDO::FETCH_CLASS, "usuario"); 
	  return $arrusuario;
	 }

	public static function Modificarusuario($usuario)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update misusuarios 
				set
				nombre=:nombre,
				clave=:password
				WHERE correo=:mail and id=:id_user and tipo=:tipo");
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
			$consulta->bindValue(':id_user', $usuario->id_user, PDO::PARAM_STR);
			$consulta->bindValue(':nombre', $usuario->nombre, PDO::PARAM_STR);		 
			$consulta->bindValue(':mail', $usuario->mail, PDO::PARAM_STR);		 
			$consulta->bindValue(':tipo', $usuario->tipo, PDO::PARAM_STR);
			$consulta->bindValue(':password', $usuario->password, PDO::PARAM_STR);
 
			

			return $consulta->execute();
	}

//--------------------------------------------------------------------------------//


//--------------------------------------------------------------------------------//

	public static function Insertarusuario($usuario)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into misusuarios (nombre,correo,tipo,clave)values(:nombre,:mail,:tipo,:password)");
			//$consulta->bindValue(':id_user',$usuario->id_user, PDO::PARAM_INT);
			$consulta->bindValue(':nombre', $usuario->nombre, PDO::PARAM_STR);
			
			$consulta->bindValue(':mail', $usuario->mail, PDO::PARAM_STR);
			
			$consulta->bindValue(':tipo', $usuario->tipo, PDO::PARAM_STR);
			$consulta->bindValue(':password', $usuario->password, PDO::PARAM_STR);
			
		$consulta->execute();		
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	
				
	}	



}
