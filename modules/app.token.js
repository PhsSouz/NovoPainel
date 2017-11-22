(function(){

	'use strict'

	angular
		.module('myApp')
		.factory('Validation', function(){
		  	return {
				Token: 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiYWRtaW4iOnRydWUsImp0aSI6IjQyYTE2MzNkLTQwMmMtNDdkYS05ZTM5LWQ5NGQyNDExNDI0YSIsImlhdCI6MTUwNzYwODQ1NywiZXhwIjoxNTA3NjEyMDU3fQ.MKJfgXzyYhBCIlbapj54i-Ra-iJl-9dM_mZRLrVYv2Q',				
		   	}
		})
	}
)();