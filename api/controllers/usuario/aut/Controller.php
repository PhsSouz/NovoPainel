<?php
    
    require_once("../../../models/usuario/ModelUsuario.php");
    require_once("../../../models/usuario/DAO.php");

    $dados  = json_decode(file_get_contents("php://input"));

    $usuario = new ModelUsuario();

    $usuario->setId($dados->id);
    $usuario->setNome($dados->nome);
    $usuario->setSobrenome($dados->sobrenome);
    $usuario->setCpf($dados->cpf);
    $usuario->setTelefone($dados->telefone);
    $usuario->setEndereco($dados->endereco);
    $usuario->setTipo($dados->tipo);
    $usuario->setEmail($dados->email);
    $usuario->setSenha($dados->senha);

    $editar = new Usuarios();

    echo $editar->Editar($usuario);
    