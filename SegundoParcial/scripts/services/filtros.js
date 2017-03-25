angular.module('app')
  .filter('tipou', function () {
  	var tipou = {
  		'administrador': 'administrador',
  		'vendedor': 'vendedor',
      'comprador': 'comprador'
  	}
    return function (input) {
    	if (!input)
    		return '';
      return tipou[input];
    };
  })
 
