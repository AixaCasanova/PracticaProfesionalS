angular
  .module('app')
  .factory('ServUsuario', function (ServUsuarioBase) {
   
    var objeto = {};
    objeto.nombre = "Factory con servicio de Banderas";
    objeto.TraerTodos = TraerTodos;
    objeto.TraerListaSuc=TraerListaSuc;
    objeto.Modif=Modif;
    objeto.Elim=Elim;
    objeto.Alta=Alta;
   
    return objeto;

 
    function TraerTodos(){
 
     return ServUsuarioBase.TraerTodos();

    };

    function TraerListaSuc(){
       return ServUsuarioBase.TraerListaSuc();

    };

    function Modif(us){

     return ServUsuarioBase.Modif(us);

    };

    function Elim(us){

     return ServUsuarioBase.Elim(us);

    };
    
 
     function Alta(us)
    {

      return ServUsuarioBase.Alta(us);
    };


  })//Cierra factory
