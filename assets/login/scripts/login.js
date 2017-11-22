(function(){
  	'use-strict';

	angular
		.module('myApp', ['ui.router','ngStorage'])
	    .controller	('usuario-login',	login)

	function login($http, $httpParamSerializer, $localStorage) {
		var self 		= this	
		self.login 		= login
		self.loginAcess = 'login.php'

		function login(data) {
			$http({
					url     : 'php/login/'+self.loginAcess,
					method  : 'POST',
					data	:  $httpParamSerializer(data)
				})
			.then(function(response) {
				console.log(response.data)
			})
		}
	}

})();