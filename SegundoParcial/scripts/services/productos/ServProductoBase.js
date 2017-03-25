angular
  .module('app')
  .service('ServProductoBase', function ($http,factorybddProducto) {
 
 
     var qhago =""; 
    var urlM = factorybddProducto.Api2;
    var urlE = factorybddProducto.Api3;
    var urlA = factorybddProducto.Api4;
    
    var url = factorybddProducto.Api;

    //Esta funcion es privada
   

      function TraerUrl(parametro,accion)
      {
 
        if (!parametro)
        {
           
      
          return url;
        }
        else{
   
           if (accion=="modif")
           {
 
             return urlM + "/" + parametro;
        
           }
            else if (accion=="elim") {
                 return urlE + "/" + parametro;
            }
           else if (accion=="alta") {
                return urlA + "/" + parametro;
           }
           else{
              return url + "/" + parametro;;
            }
        }

      } 

         this.AltaP =function(p){
            
            qhago="alta";
          return $http.post(TraerUrl(p,qhago)).then(
            function (respuesta){
            
              return respuesta.data;
              
            },
            function (error){
              return error;
            }
            );
        }

      

         this.ModifP =function(p){
            
            qhago="modif";
          return $http.post(TraerUrl(p,qhago)).then(
            function (respuesta){
            
              return respuesta.data;
              
            },
            function (error){
              return error;
            }
            );
        }


  
           this.EliminarP =function(p){
            
            qhago="elim";
          return $http.post(TraerUrl(p,qhago)).then(
            function (respuesta){
            
              return respuesta.data;
              
            },
            function (error){
              return error;
            }
            );
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



  })//Cierra Servicio
