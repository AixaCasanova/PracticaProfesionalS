angular
  .module('app')
  .service('ServloginBase', function ($http,factorybddLogin) {
 
 
    var url = factorybddLogin.Api;
    var url2 = factorybddLogin.Api2;
     
    //Esta funcion es privada
    function TraerUrl(parametro){
      if (!parametro)
        return url;
      else
        if (parametro!="todos") 
        {
          return url + "/" + parametro;
        }else
        {
          return url2;
        }
    }

    this.TraerUnLogin=function(pers){
      
      return $http.post(TraerUrl(pers)).then(
        function (respuesta){
                  return respuesta.data;
          
        },
        function (error){
          return error;
        }
        );
    }

    this.TraerTodos =function(){
      var paramTodos="todos";
      return $http.get(TraerUrl(paramTodos)).then(
        function (respuesta){
           
          return respuesta.data;
          
        },
        function (error){
          return error;
        }
        );
    }



  })//Cierra Servicio
