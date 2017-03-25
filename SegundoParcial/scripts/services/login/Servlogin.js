angular
  .module('app')
  .factory('Servlogin', function (ServloginBase) {
   
    var objeto = {};
    objeto.nombre = "Servlogin";
    objeto.TraerUnLogin = TraerUnLogin;
    objeto.TraerTodos=TraerTodos;
    return objeto;

 
    function TraerUnLogin(pers)
    {
       
      return ServloginBase.TraerUnLogin(pers);
    };

        function TraerTodos(){
     
     return ServloginBase.TraerTodos();

    };

 


  })//Cierra factory
