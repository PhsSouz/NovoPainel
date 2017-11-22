(function(){

  	'use strict';

	angular
		.module('myApp')
		.directive('consultas',Partials)

	    function Partials(){
	      	return {
	        	templateUrl: 'modules/views/consulta/partials.html'
	      	}
	    }
})();