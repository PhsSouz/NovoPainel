(function(){
	'use strict'
	
	angular
		.module('myApp')
		.config(function ($stateProvider, $urlRouterProvider) {
			$stateProvider

			//Inicio
		    .state('inicio', {
		        url: '/',
		        templateUrl: 'modules/views/home/inicio.html',
		    })		    

		    //Usuarios
		    .state('usuario', {
		        url: 'usuarios',
		        templateUrl: 'modules/views/usuario/usuarios.html',
		    })			    

		    .state('usuario-edit', {
		        url: 'usuarios/edit/:id',
		        templateUrl: 'modules/views/usuario/usuariosEdit.html',
		    })			    

		    .state('usuario-create', {
		        url: 'usuarios/create/',
		        templateUrl: 'modules/views/usuario/usuariosCreate.html',
		    })		    

		    //Consultas
		    .state('consultas', {
		        url: 'consulta/list/:id',
		        templateUrl: 'modules/views/consulta/consultas.html',
		    })		    

		    .state('consulta-edit', {
		        url: 'consulta/edit/:id',
		        templateUrl: 'modules/views/consulta/consultasEdit.html',
		    })		    

		    .state('consulta-create', {
		        url: 'consulta/create/:id',
		        templateUrl: 'modules/views/consulta/consultasCreate.html',
		    })

		    //Extrato
		    .state('pagamentos', {
		        url: 'pagamento',
		        templateUrl: 'modules/views/financeiro/pagamentos.html',
		    })			    

		    .state('pagamentos-create', {
		        url: 'pagamento/create/',
		        templateUrl: 'modules/views/financeiro/pagamentosCreate.html',
		    })			    
		})
	})
();