<?php
require_once"AccesoDatos.php";
class ofertas
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	public $id_oferta;
	public $descripcion;
 	public $precio;
  
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
  	public function Getid_oferta()
	{
		return $this->id_oferta;
	}
	public function Getdescripcion()
	{
		return $this->descripcion;
	}
	public function Getprecio()
	{
		return $this->precio;
	}

	public function Setid_oferta($valor)
	{
		$this->id_oferta = $valor;
	}
	public function Setdescripcion($valor)
	{
		$this->descripcion = $valor;
	}
	public function Setprecio($valor)
	{
		$this->precio = $valor;
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
	public static function TraerUnaoferta($Parametro) 
	{	


		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from ofertas where id_oferta =:id_oferta");
		$consulta->bindValue(':id_oferta', $Parametro, PDO::PARAM_INT);
		$consulta->execute();
		$VotoBuscado= $consulta->fetchObject('ofertas');
		return $VotoBuscado;	
					
	}
	
	public static function TraerTodosLasofertas()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from ofertas");
		$consulta->execute();			
		$arrVotos= $consulta->fetchAll(PDO::FETCH_CLASS, "ofertas");	
		return $arrVotos;
	}
	
	public static function Borraroferta($idParametro)
	{	
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("delete from ofertas WHERE id_oferta=:id_oferta");	
		$consulta->bindValue(':id_oferta',$idParametro, PDO::PARAM_INT);		
		$consulta->execute();
		return $consulta->rowCount();
		
	}
	public static function Modificaroferta($ofertas)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update ofertas 
				precio=:precio,	
				descripcion=:descripcion,
				WHERE id_oferta=:id_oferta");

			$consulta->bindValue(':id_oferta',$ofertas->id_oferta, PDO::PARAM_INT);
			$consulta->bindValue(':precio', $ofertas->precio, PDO::PARAM_STR);
			$consulta->bindValue(':descripcion', $ofertas->descripcion, PDO::PARAM_STR);
			return $consulta->execute();
	}

//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//

	public static function Insertaroferta($ofertas)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into ofertas (id_oferta,precio,descripcion)values(:id_oferta,:precio,:descripcion)");
		$consulta->bindValue(':precio', $ofertas->precio, PDO::PARAM_STR);
		$consulta->bindValue(':id_oferta', $ofertas->id_oferta, PDO::PARAM_STR);
		$consulta->bindValue(':descripcion', $ofertas->descripcion, PDO::PARAM_STR);
		$consulta->execute();		
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
				
	}	
//--------------------------------------------------------------------------------//


}
