(function(){

	'use strict'

	let path 	= 'Controller.php'
	let pathPac = 'ControllerPaciente.php'

	angular
		.module('myApp').factory('UsuarioService', function($http){
		  	return {
			    index : function(){
			        return $http.get("api/controllers/usuario/list/"+path)
			    },			    
			    edit : function(id){
					return $http({
						method: 'POST',
						url: 'api/controllers/usuario/edit/'+path,
						data: id
					})
			    },
				destroy: function(data){
					return $http({
						method: 'POST',
						url: 'api/controllers/usuario/drop/'+path,
						data: data
					})
				},				
				create: function(data){
					return $http({
						method: 'POST',
						url: 'api/controllers/usuario/create/'+path,
						data: data
					})
				},					
				createPaciente: function(data,obs,nasc){
					return $http({
						method: 'POST',
						url: 'api/controllers/usuario/create/'+pathPac,
						data: {data: data, obs: obs,nasc: nasc}
					})
				},				
				update: function(data){
					return $http({
						method: 'POST',
						url: 'api/controllers/usuario/aut/'+path,
						data: data
					})
				},
		   	}
		})
	}
)();
