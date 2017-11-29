(function(){
  	'use strict';

	angular
		.module('myApp')
	    .controller	('consultasController',	Controller)

	function Controller($scope, $http, $httpParamSerializer, $localStorage, $state, ConsultaService,UsuarioService) {
		var self 			= 	this
		self.listar 		=	listar
		self.listarPacientes 	=	listarPacientes
		self.listarDentista 	=	listarDentista
		self.listarEspec 		=	listarEspec
		self.cadastrar 			=	cadastrar
		self.deletar 			=	deletar
		self.showConsulta 		=	showConsulta
		self.editar 			= 	editar
		self.atualizar 			= 	atualizar
		self.listarPacientes()
		self.listarDentista()
		self.listarEspec()
		self.listar()
		self.arrPas 	= 	[]
		self.arrDent	=	[]
		self.arrEspec	=	[]
		self.arrCons	=	[]

		function listar() {
			ConsultaService.index()
				.then(function(response){
					self.arrCons = response.data
				}
			)
		}		

		function listarDentista(){
			ConsultaService.listarDentista()
			.then(function(dentistas){
				self.arrDent = dentistas.data
			})
		}

		function listarPacientes(){
			ConsultaService.listarPaciente()
			.then(function(pacientes){
				self.arrPas = pacientes.data
			})
		}		

		function listarEspec(){
			ConsultaService.listarEspec()
			.then(function(especialidades){
				self.arrEspec = especialidades.data
			})
		}

		function cadastrar(consulta){
			ConsultaService.validaConculta(consulta)
			.then(function(response){
				if(response.data != ''){
					swal("Consulta não cadastrada!", "Dentista ja tem uma consulta cadastratada nesta data.");
				}else{
					ConsultaService.create(consulta)
					.then(function(especialidades){
						if(especialidades.data == 200){
							swal({
								title: "Consulta cadastrada com sucesso!",
								text: "Clique em Ok para continuar!",
								icon: "success",
								button: "Ok!",
							}).then((value) => {
								$state.go('consultas')
							})
						}else{
							swal("Consulta não cadastrada!", "Tente novamente.");
						}
					})
				}
			})
		}

		function deletar(id,index){
			swal({
				title: "Deseja deletar essa Consulta?",
				text: "Essa operação não pode ser desfeita!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
			  	if(willDelete) {
					ConsultaService.destroy(id)
						.then(function(response){
							if(response.data == 200){
								self.arrCons.splice(index, 1)
						    	swal("Consulta deletada com sucesso!", {
						      		icon: "success", 
						    	})
							}else{
								swal("Consulta não cadastrada!", "Tente novamente.")
							}
						}
					)
			  	}
			})
		}

		function showConsulta(consulta){
			$state.go('consulta-edit',{id:consulta})
		}

		function editar(){
			ConsultaService.edit($state.params.id)
				.then(function(response){
					self.consulta = response.data[0]

					let data = new Date(self.consulta.con_data)

					self.consulta.con_data = data
				}
			)
		}

		function atualizar(consulta){
			ConsultaService.update(consulta)
				.then(function(response){
					if(response.data == 200){
						swal({
							title: "Consulta editada com sucesso!",
							text: "Clique em Ok para continuar!",
							icon: "success",
							button: "Ok!",
						}).then((value) => {
							$state.go('consultas')
						})
					}else{
						swal("Consulta não editada!", "Tente novamente.")
					}
				}
			)
		}
	}
})();