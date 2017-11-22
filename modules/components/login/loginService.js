(function(){

	'use strict'

	let path = "login.php"

	angular
		.module('myApp').factory('LoginService', function($http,ApiService){
		  return {
		    	login : function(data){
					return $http({
						method: 'POST',
						url: ApiService.BASEURL+'/login/acesso/'+path,
						data: data,
					})
				},

 				destroySession : function(){
			        return $http.get(ApiService.BASEURL+"/login/deslogar/Controller.php")
			    },
		    }
		})
	}
)();
