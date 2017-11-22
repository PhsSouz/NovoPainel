(function(){
  	'use strict';

	angular
		.module('myApp')
	    .controller	('usuariosController',	Controller)

	function Controller($http, $httpParamSerializer, $state, $localStorage, UsuarioService) {
		var self 			= 	this
		self.listar 		= 	listar
		self.deletar 		= 	deletar
		self.editar 		= 	editar
		self.atualizar 		= 	atualizar
		self.showUsuario 	= 	showUsuario
		self.cadastrar 		= 	cadastrar
		self.createSuccess	=	false
		self.deleteSuccess	=	false
		self.click 			=	click
		self.obs			=	false
		self.loader			=	false
		self.nome 			= 	window.localStorage.getItem('Nome')
	
		function listar() {
			UsuarioService.index()
				.then(function(response){
					self.usuarios = response.data
				}
			)
		}

		function click(tipo){
			if(tipo == 1)
			{
				self.obs =	true
			}else{
				self.obs =	false
			}
		}

		function cadastrar(usuario) {
			self.loader = true
			UsuarioService.create(usuario)
				.then(function(response){
					if(response.data != ''){
						self.loader = false
						UsuarioService.createPaciente(response.data[0],usuario.obs,usuario.nasc)
						.then(function(paciente){
							if(paciente.data != ''){
								swal({
									title: "Usuário cadastrado com sucesso!",
									text: "Clique em Ok para continuar!",
									icon: "success",
									button: "Ok!",
								}).then((value) => {
									$state.go('usuario')
								})
							}else{
								self.loader = false
								swal("Usuario não cadastrado!", "Tente novamente.");
							}
						})	
					}else{
						self.loader = false
						swal("Usuario não cadastrado!", "Tente novamente.");
					}
				}
			)
		}

		function deletar(index,id){
			swal({
				title: "Deseja deletar esse Usuário?",
				text: "Essa operação não pode ser desfeita!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
			  	if(willDelete) {
					UsuarioService.destroy(id)
						.then(function(response){
							if(response.data == 200){
								self.usuarios.splice(index, 1)
							}
						}
					)
			    	swal("Usuário deletado com sucesso!", {
			      		icon: "success", 
			    	})
			  	}
			})
		}

		function showUsuario(usuario){
			$state.go('usuario-edit',{id:usuario})
		}

		function editar(){
			UsuarioService.edit($state.params.id)
				.then(function(response){
					self.usuario = response.data[0]
					if(self.usuario.tipo == 1){
						self.obs =	true
					}
				}
			)
		}

		function atualizar(usuario){
			UsuarioService.update(usuario)
				.then(function(response){
					if(response.data == 200){
						swal({
							title: "Usuário editado com sucesso!",
							text: "Clique em Ok para continuar!",
							icon: "success",
							button: "Ok!",
						}).then((value) => {
							$state.go('usuario')
						})
					}
				}
			)
		}
	}
})();