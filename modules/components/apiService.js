(function(){

	'use strict'

	angular
		.module('myApp')
		.factory('ApiService', function($http){
		  	return {
				BASEURL: 'api/controllers',				
		   	}
		})
	}
)();
