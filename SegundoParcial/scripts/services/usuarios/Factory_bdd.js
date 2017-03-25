angular
  .module('app')
  .factory('factorybdd', function ($http) {  
    var objeto = {};
    objeto.nombre = "Factory de Rutas";

    objeto.Api ="http://localhost:8026/SegundoParcial/ws/usuarios"
    objeto.Api2 ="http://localhost:8026/SegundoParcial/ws/sucursales";
    objeto.Api3 ="http://localhost:8026/SegundoParcial/ws/ModifUs";
    objeto.Api4 ="http://localhost:8026/SegundoParcial/ws/ElimUs";
    objeto.Api5 ="http://localhost:8026/SegundoParcial/ws/AltaUs";
    return objeto;


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


        function TraerListaSuc(){
        return $http.get(TraerUrl()).then(
        function (respuesta){
        console.info("resp factory suc:",respuesta);
          return respuesta.data;
        },
        function (error){
          return error;
        }
        );
    }

      function Modif(us){
     
      return $http.post(TraerUrl(us)).then(
        function (respuesta){
      
          return respuesta.data;
        },
        function (error){
          return error;
        }
        );
    }

     function Elim(us){
     
      return $http.post(TraerUrl(us)).then(
        function (respuesta){
      
          return respuesta.data;
        },
        function (error){
          return error;
        }
        );
    }

      function Alta(us){
      return $http.post(TraerUrl(us)).then(
        function (respuesta){
          console.info("desde factory bdd",respuesta);
          return respuesta.data;
        },
        function (error){
          return error;
        }
        );
    }

  })//Cierra factory
