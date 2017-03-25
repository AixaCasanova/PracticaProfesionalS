angular
  .module('app', [
    'ui.router',
    'ui.grid',
    'ui.grid.pagination',
    'ui.grid.resizeColumns',
    'ui.grid.selection',
    'ui.grid.exporter',
    'ui.grid.edit',
    'ngMap',
    'satellizer'
    ]
    )
  .config(function ($stateProvider, $urlRouterProvider, $authProvider) {

    $authProvider.loginUrl = "SegundoParcial/jwt/php/auth.php";
    $authProvider.tokenName = "segundoparcial";
    $authProvider.tokenPrefix = "Aplicacion";
    $authProvider.authHeader="data";

    $urlRouterProvider.otherwise('#');
    $stateProvider
    .state('inicio', {
      url: '/inicio',
      templateUrl: 'index.html'
    })
    .state('usuarios', {
      url: '/usuarios',
      templateUrl: 'views/usuarios.html',
      controller:'CtrolUsuario'
    })
    .state('productos', {
      url: '/productos',
      templateUrl: 'views/productos.html',
      controller:'CtrolProductos'
    })
    .state('login', {
      url: '/login',
      templateUrl: 'views/login.html',
      controller:'CtrolLogin'
    })
     .state('empleados', {
      url: '/empleados',
      templateUrl: 'views/empleados.html',
      controller:'CtrolEmpleados',
      params:{'parametro':'parametro'} 
    })
    .state('clientes', {
      url: '/clientes',
      templateUrl: 'views/clientes.html',
      controller:'CtrolClientes'
    })
    .state('AltaCliente', {
      url: '/AltaCliente',
      templateUrl: 'views/AltaClienteS.html',
      controller:'CtrolClientes'
    })
    .state('ModifCli', {
      url: '/ModifCli',
      templateUrl: 'views/ModifClientes.html',
      controller:'CtrolClientes',
      params:{'parametro':'parametro'} 
    })
    .state('EliminarCli', {
      url: '/EliminarCli',
      templateUrl: 'views/EliminarClientes.html',
      controller:'CtrolClientes',
      params:{'parametro':'parametro'} 
    })
    .state('AltaEmpleado', {
      url: '/AltaEmpleado',
      templateUrl: 'views/AltaEmpleado.html',
      controller:'CtrolEmpleados' 
    })
      .state('ModifEmp', {
      url: '/ModifEmp',
      templateUrl: 'views/ModifEmp.html',
      controller:'CtrolEmpleados',
      params:{'parametro':'parametro'} 
    })
    .state('EliminarEmp', {
      url: '/EliminarEmp',
      templateUrl: 'views/EliminarEmp.html',
      controller:'CtrolEmpleados',
      params:{'parametro':'parametro'} 
    })
     
     .state('AltaProd', {
      url: '/AltaProd',
      templateUrl: 'views/AltaProd.html',
      controller:'CtrolProductos'
    })   
      .state('ModifP', {
      url: '/ModifP',
      templateUrl: 'views/ModifP.html',
      controller:'CtrolProductos',
      params:{'parametro':'parametro'} 
    })
      .state('EliminarP', {
      url: '/EliminarP',
      templateUrl: 'views/EliminarP.html',
      controller:'CtrolProductos',
      params:{'parametro':'parametro'} 
    })
      .state('ModifUs', {
      url: '/ModifUs',
      templateUrl: 'views/ModifUs.html',
      controller:'CtrolUsuario',
      params:{'parametro':'parametro'} 
    })
     .state('EliminarUs', {
      url: '/EliminarUs',
      templateUrl: 'views/EliminarUs.html',
      controller:'CtrolUsuario',
      params:{'parametro':'parametro'} 
    })
    .state('AltaUs', {
      url: '/AltaUs',
      templateUrl: 'views/AltaUs.html',
      controller:'CtrolUsuario'
    })   

      

      
    
  });



