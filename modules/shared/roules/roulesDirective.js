(function(){

  	'use strict';

	angular
		.module('myApp')
		.directive('roulesmenu', Partials)

	    function Partials(){
	    	let permissao 	= window.localStorage.getItem("Tipo")

	      	if(permissao == 3){
	      		return {
	        		templateUrl: 'modules/views/roules/dentista/dentistaView.html'
	        	}
	        }
        	if(permissao == 2){
        		return {
        			templateUrl: 'modules/views/roules/recepcionista/recepcionistaView.html'
        		}
        	}	        	
        	if(permissao == 1){
        		return {
        			templateUrl: 'modules/views/roules/cliente/clienteView.html'
        		}
        	}
	    }
})();