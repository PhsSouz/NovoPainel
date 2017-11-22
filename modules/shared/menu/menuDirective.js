(function(){

  	'use strict';

	angular
		.module('myApp')
		.directive('menu',Partials)

	    function Partials(){
	      	return {
	        	templateUrl: 'modules/views/menu/index.html'
	      	}
	    }
})();