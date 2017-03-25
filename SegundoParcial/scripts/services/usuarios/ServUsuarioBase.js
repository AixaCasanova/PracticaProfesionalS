angular
  .module('app')
  .service('ServUsuarioBase', function ($http,factorybdd) {
    this.Nombre = "ServUsuarioBase";factorybdd;
 
    var url = factorybdd.Api;
    var urlS = factorybdd.Api2;
    var urlM = factorybdd.Api3;
    var urlE= factorybdd.Api4;
     var urlA= factorybdd.Api5;
   
   function TraerUrl(parametro,accion){
 
      if (!parametro)
      {
         
    
        return url;
      }
      else{
 
         if (accion=="modif")
         {
         
        
           return urlM + "/" + parametro;
      
         }else if (accion=="suc") {
 
          return urlS;
        }
         else if (accion=="elim") {
              return urlE + "/" + parametro;
         }else if (accion=="alta") {
              return urlA + "/" + parametro;
         }
         else{
            return url + "/" + parametro;;
          }
      }

    }

    this.TraerTodos =function(){
      return $http.get(TraerUrl()).then(
        function (respuesta){
 
          return respuesta.data;
          
        },
        function (error){
          return error;
        }
        );
    }

        this.TraerListaSuc =function()
        {
           qhago="suc";
          return $http.get(TraerUrl("NA",qhago)).then(
          function (respuesta){
   
            return respuesta.data;
            
          },
          function (error){
            return error;
          }
          );
        }

      this.Modif =function(empleado)
        {
              qhago="modif";
        
          return $http.post(TraerUrl(empleado,qhago)).then(
            function (respuesta){
           
              return respuesta.data;
              
            },
            function (error){
              return error;
            }
            );
        }

     this.Elim =function(empleado)
    {
        qhago="elim";
    
      return $http.post(TraerUrl(empleado,qhago)).then(
        function (respuesta){
       
          return respuesta.data;
          
        },
        function (error){
          return error;
        }
      );
    }



     this.Alta=function(us){
            
            qhago="alta";
          return $http.post(TraerUrl(us,qhago)).then(
            function (respuesta){
            
              return respuesta.data;
              
            },
            function (error){
              return error;
            }
            );
        }


  })//Cierra Servicio
