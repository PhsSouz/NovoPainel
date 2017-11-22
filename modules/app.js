//Path's
var _ = require('lodash');
var _ = require('lodash/core');
var fp = require('lodash/fp');
var array = require('lodash/array');
var object = require('lodash/fp/object');
var at = require('lodash/at');
var curryN = require('lodash/fp/curryN');

//Libs
require('./lib/angular.js')
require('./lib/ui-router.js')
require('./lib/storage.js')
require('./lib/pagination/dirPagination.js')
require('satellizer')

require('sweetalert')

require('./app.modules.js')

require('./app.routes.js')

//API
require ('./components/apiService.js')

require ('./app.token.js')

// Painel
require ('./components/painel/painelController.js')

//Consultas
require ('./components/consultas/consultasController.js')
require ('./components/consultas/consultasService.js')
require ('./shared/consultas/consultasDirective.js')

//Financeiro
require ('./components/financeiro/financeiroController.js')
require ('./components/financeiro/financeiroService.js')
require ('./shared/pagamentos/pagamentosDirective.js')

//Login
require ('./components/login/loginController.js')
require ('./components/login/loginService.js')

//Usuarios
require ('./components/usuarios/usuariosController.js')
require ('./components/usuarios/usuariosService.js')
require ('./shared/usuarios/usuariosDirective.js')

require ('./shared/roules/roulesDirective.js')

require ('./shared/login/loginDirective.js')
require ('./shared/menu/menuDirective.js')