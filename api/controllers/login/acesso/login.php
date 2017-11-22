<?php
    
    require_once("../../../models/login/ModelUsuario.php");
    require_once("../../../models/login/DAO.php");

    $dados      = file_get_contents("php://input");

    $array = json_decode($dados);

    $email  = $array->email;
    $senha  = $array->senha;

    $dadosLogin = new ModelUsuario();

    $dadosLogin->setEmail($email);
    $dadosLogin->setSenha($senha);

    $usuarioLogin = new Login();

    echo $usuarioLogin->Logar($dadosLogin);

    