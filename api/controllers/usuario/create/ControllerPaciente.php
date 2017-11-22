<?php
    
    require_once("../../../models/usuario/ModelUsuario.php");
    require_once("../../../models/usuario/DAO.php");

    $dados  =   json_decode(file_get_contents("php://input"));

    $usuario = new ModelUsuario();

    $usuario->setId($dados->data->id);
    $usuario->setNasc($dados->nasc);
    $usuario->setObs($dados->obs);
    $usuario->setNome($dados->data->nome);
    $usuario->setEndereco($dados->data->endereco);
    $usuario->setTelefone($dados->data->telefone);

    $cadastro = new Usuarios();

    echo $cadastro->InserirPaciente($usuario);
    
