<?php
require_once"accesoDatos.php";
class sucursal
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	public $id_sucursal;
	public $direccion;
 	public $nombre;
  	public $foto1;
  	public $foto2;
  	public $foto3;
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
  	public function Getid_sucursal()
	{
		return $this->id_sucursal;
	}
	public function Getfoto2()
	{
		return $this->foto2;
	}
	public function Getnombre()
	{
		return $this->nombre;
	}
	public function Getdireccion()
	{
		return $this->direccion;
	}

	public function Getfoto1()
	{
		return $this->foto1;
	}

	public function Getfoto3()
	{
		return $this->foto3;
	}

	public function Setfoto3($valor)
	{
		$this->foto3 = $valor;
	}

	public function Setid_sucursal($valor)
	{
		$this->id_sucursal = $valor;
	}
	public function Setfoto2($valor)
	{
		$this->foto2 = $valor;
	}
	public function Setnombre($valor)
	{
		$this->nombre = $valor;
	}
	public function Setdireccion($valor)
	{
		$this->direccion = $valor;
	}
	public function Setfoto1($valor)
	{
		$this->foto1 = $valor;
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
	  
	}
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODO DE CLASE
	public static function TraerUnasucursal($Parametro) 
	{	


		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from sucursal where id_sucursal =:id_sucursal");
		$consulta->bindValue(':id_sucursal', $Parametro, PDO::PARAM_INT);
		$consulta->execute();
		$VotoBuscado= $consulta->fetchObject('sucursal');
		return $VotoBuscado;	
					
	}
	
	public static function TraerTodosLasSucursales()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from sucursal");
		$consulta->execute();			
		$arrVotos= $consulta->fetchAll(PDO::FETCH_CLASS, "sucursal");	
		return $arrVotos;
	}
	
	public static function BorrarSucursal($idParametro)
	{	
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("delete from sucursal WHERE id_sucursal=:id_sucursal");	
		$consulta->bindValue(':id_sucursal',$idParametro, PDO::PARAM_INT);		
		$consulta->execute();
		return $consulta->rowCount();
		
	}
	public static function ModificarSucursal($sucursal)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update sucursal 
				set direccion=:direccion,
				nombre=:nombre,
				foto1=:foto1,
				foto2=:foto2,
				foto3=:foto3
				WHERE id_sucursal=:id_sucursal");

			$consulta->bindValue(':id_sucursal',$sucursal->id_sucursal, PDO::PARAM_INT);
			$consulta->bindValue(':direccion',$sucursal->direccion, PDO::PARAM_STR);
			$consulta->bindValue(':nombre', $sucursal->nombre, PDO::PARAM_STR);
			$consulta->bindValue(':foto1', $sucursal->foto1, PDO::PARAM_STR);
			$consulta->bindValue(':foto2', $sucursal->foto2, PDO::PARAM_STR);
			$consulta->bindValue(':foto3', $sucursal->foto3, PDO::PARAM_STR);
			return $consulta->execute();
	}

//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//

	public static function InsertarSucursal($sucursal)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into sucursal (id_sucursal,direccion,nombre,foto2,foto1,foto3)values(:id_sucursal,:direccion,:nombre,:foto2,:foto1,:foto3)");
		$consulta->bindValue(':direccion',$sucursal->direccion, PDO::PARAM_STR);
		$consulta->bindValue(':nombre', $sucursal->nombre, PDO::PARAM_STR);
		$consulta->bindValue(':id_sucursal', $sucursal->id_sucursal, PDO::PARAM_STR);
		$consulta->bindValue(':foto1', $sucursal->foto1, PDO::PARAM_STR);
		$consulta->bindValue(':foto2', $sucursal->foto2, PDO::PARAM_STR);
		$consulta->bindValue(':foto3', $sucursal->foto3, PDO::PARAM_STR);
		$consulta->execute();		
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
				
	}	
//--------------------------------------------------------------------------------//


}
