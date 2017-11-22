(function(){

	'use strict'

	let path 		= 'Controller.php'
	let pathPasc 	= 'ControllerPaciente.php'
	let pathDent 	= 'ControllerDentista.php'
	let pathEspec 	= 'ControllerEspec.php'

	angular
		.module('myApp').factory('ConsultaService', function($http){
		  	return {
				destroy: function(data,imagem){
					return $http({
						method: 'POST',
						url: 'api/controllers/consulta/drop/'+path,
						data: {id: data, imagem:imagem}
					})
				},
			    edit : function(id){
					return $http({
						method: 'POST',
						url: 'api/controllers/consulta/edit/'+path,
						data: id
					})
			    },			    
			    index : function(data){
					return $http({
						method: 'POST',
						url: 'api/controllers/consulta/list/'+path,
						data: data
					})
			    },			    
			    listarPaciente : function(data){
					return $http({
						method: 'POST',
						url: 'api/controllers/consulta/list/'+pathPasc,
						data: data
					})
			    },			    
			    listarDentista : function(data){
					return $http({
						method: 'POST',
						url: 'api/controllers/consulta/list/'+pathDent,
						data: data
					})
			    },			    
			    listarEspec : function(data){
					return $http({
						method: 'POST',
						url: 'api/controllers/consulta/list/'+pathEspec,
						data: data
					})
			    },			    
			    create : function(data){
					return $http({
						method: 'POST',
						url: 'api/controllers/consulta/create/'+path,
						data: data
					})
			    },			    
			    destroy : function(data){
					return $http({
						method: 'POST',
						url: 'api/controllers/consulta/drop/'+path,
						data: data
					})
			    },			    
			    edit : function(data){
					return $http({
						method: 'POST',
						url: 'api/controllers/consulta/edit/'+path,
						data: data
					})
			    },			    
			    update : function(data){
					return $http({
						method: 'POST',
						url: 'api/controllers/consulta/aut/'+path,
						data: data
					})
			    },
		   	}
		})
	}
)();
