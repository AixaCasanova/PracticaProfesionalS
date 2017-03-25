<?php
require_once"accesoDatos.php";
class pedidos
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	public $id_pedidos;
	public $lista_productos;
 	public $total_pedido;
  
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
  	public function Getid_pedidos()
	{
		return $this->id_pedidos;
	}
	public function Getlista_productos()
	{
		return $this->lista_productos;
	}
	public function Gettotal_pedido()
	{
		return $this->total_pedido;
	}

	public function Setid_pedidos($valor)
	{
		$this->id_pedidos = $valor;
	}
	public function Setlista_productos($valor)
	{
		$this->lista_productos = $valor;
	}
	public function Settotal_pedido($valor)
	{
		$this->total_pedido = $valor;
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
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from pedidos where id_pedidos =:id_pedidos");
		$consulta->bindValue(':id_pedidos', $Parametro, PDO::PARAM_INT);
		$consulta->execute();
		$VotoBuscado= $consulta->fetchObject('pedidos');
		return $VotoBuscado;	
					
	}
	
	public static function TraerTodosLasSucursales()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from pedidos");
		$consulta->execute();			
		$arrVotos= $consulta->fetchAll(PDO::FETCH_CLASS, "pedidos");	
		return $arrVotos;
	}
	
	public static function BorrarSucursal($idParametro)
	{	
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("delete from pedidos WHERE id_pedidos=:id_pedidos");	
		$consulta->bindValue(':id_pedidos',$idParametro, PDO::PARAM_INT);		
		$consulta->execute();
		return $consulta->rowCount();
		
	}
	public static function ModificarSucursal($pedidos)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update pedidos 
				total_pedido=:total_pedido,	
				lista_productos=:lista_productos,
				WHERE id_pedidos=:id_pedidos");

			$consulta->bindValue(':id_pedidos',$pedidos->id_pedidos, PDO::PARAM_INT);
			$consulta->bindValue(':total_pedido', $pedidos->total_pedido, PDO::PARAM_STR);
			$consulta->bindValue(':lista_productos', $pedidos->lista_productos, PDO::PARAM_STR);
			return $consulta->execute();
	}

//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//

	public static function InsertarSucursal($pedidos)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into pedidos (id_pedidos,total_pedido,lista_productos)values(:id_pedidos,:total_pedido,:lista_productos)");
		$consulta->bindValue(':total_pedido', $pedidos->total_pedido, PDO::PARAM_STR);
		$consulta->bindValue(':id_pedidos', $pedidos->id_pedidos, PDO::PARAM_STR);
		$consulta->bindValue(':lista_productos', $pedidos->lista_productos, PDO::PARAM_STR);
		$consulta->execute();		
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
				
	}	
//--------------------------------------------------------------------------------//


}
