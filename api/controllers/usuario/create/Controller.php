<?php
    
    require_once("../../../models/usuario/ModelUsuario.php");
    require_once("../../../models/usuario/DAO.php");

    $dados  =   json_decode(file_get_contents("php://input"));

    $usuario = new ModelUsuario();

    $usuario->setNome($dados->nome);
    $usuario->setSobrenome($dados->sobrenome);
    $usuario->setCpf($dados->cpf);
    $usuario->setEndereco($dados->endereco);
    $usuario->setTipo($dados->tipo);
    $usuario->setTelefone($dados->telefone);
    $usuario->setEmail($dados->email);
    $usuario->setSenha($dados->senha);

    $cadastro = new Usuarios();

    echo $cadastro->Inserir($usuario);
    
