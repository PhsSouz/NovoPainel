(function(){

  	'use strict';

	angular
		.module('myApp')
		.directive('usuario',Partials)

	    function Partials(){
	      	return {
	        	templateUrl: 'modules/views/usuario/partials.html'
	      	}
	    }
})();