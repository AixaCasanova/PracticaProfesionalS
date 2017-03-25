angular
  .module('app')
  .factory('factorybddLogin', function ($http) {  
    var objeto = {};
    objeto.nombre = "factorybddLogin";

    objeto.Api ="http://localhost:8026/SegundoParcial/ws/login";
    objeto.Api2 ="http://localhost:8026/SegundoParcial/ws/usuarios";
    return objeto;


    function TraerUnLogin(pers){
      console.info("desdefacttory:",pers);
      return $http.post(TraerUrl(pers)).then(
        function (respuesta){
          console.info("desde factorybddLogin",respuesta);
          console.info(respuesta.data);
          return respuesta.data;
        },
        function (error){
          console.info("errordefactory:",error);
          return error;
        }
        );
    }

        function TraerTodos(){
      return $http.get(TraerUrl()).then(
        function (respuesta){
          console.info("desde factory bdd",respuesta.data);
          return respuesta.data;
        },
        function (error){
          return error;
        }
        );
    }
    
  })//Cierra factory
