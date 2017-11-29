(function(){

	'use strict'

	angular
		.module('myApp')
		.directive('login', function($http, Validation){
	      	return {
	        	templateUrl: 'modules/views/login/index.html'
	      	}
	    })

		.factory('ValidateLogin', function($http, Validation, $state){
		  	return {
				validacao: function Token(){
					if(_.isEmpty(window.localStorage.getItem('Token')) == true){
						swal("Ops!", "Entre com seu usuário para ter acesso ao sistema!")
							.then((value) => {
								window.location.assign("http://localhost/NovoPainel")
							}
						);
					}
				},
				getLogin: function(response){
					window.localStorage.setItem("Id", 			response.data[0].id)
					window.localStorage.setItem("Nome", 		response.data[0].nome)
					window.localStorage.setItem("Sobrenome", 	response.data[0].sobrenome)
					window.localStorage.setItem("Email", 		response.data[0].email)
					window.localStorage.setItem("Endereco", 	response.data[0].endereco)
					window.localStorage.setItem("Cpf", 			response.data[0].cpf)
					window.localStorage.setItem("Senha", 		response.data[0].senha)
					window.localStorage.setItem("Tipo", 		response.data[0].tipo)
					window.localStorage.setItem("Token", 		Validation.Token)
				},
				deleteLogin: function(){
					window.localStorage.removeItem("Id")
					window.localStorage.removeItem("Nome")
					window.localStorage.removeItem("Sobrenome")
					window.localStorage.removeItem("Email")
					window.localStorage.removeItem("Endereco")
					window.localStorage.removeItem("Cpf")
					window.localStorage.removeItem("Senha")
					window.localStorage.removeItem("Tipo")
					window.localStorage.removeItem("Token")
				}				
		   	}
		})
	}
)();
