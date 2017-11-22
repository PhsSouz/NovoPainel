(function(){

  	'use strict';

	angular
		.module('myApp')
		.directive('pagamentos',Partials)

	    function Partials(){
	      	return {
	        	templateUrl: 'modules/views/financeiro/partials.html'
	      	}
	    }
})();