(function(){
  	'use strict';

	angular
		.module('myApp')
	    .controller	('loginController',	Controller)

	function Controller($scope, $http, $httpParamSerializer, $localStorage, LoginService, Validation, ValidateLogin){

		var self 				= 	this	
		self.logar 				=	logar
		$localStorage.loader 	=	false
		$localStorage.button 	=	true

		self.loader =  	$localStorage.loader
		self.button =	$localStorage.button

		function logar(data) {
			self.loader 	=	true
			self.button 	=	false
			LoginService.login(data).then(function(response){
				console.log(response)
				if(response.data != ''){
					ValidateLogin.getLogin(response)
					window.location.assign("inicio")
				}
				else{
					swal("Usuário incorreto!", "Email ou senha incorreto, tente novamente");
					self.loader 	=	false
					self.button 	=	true	
				}
			})
		}
	}
})();
