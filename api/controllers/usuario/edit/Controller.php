<?php
    require_once("../../../models/usuario/ModelUsuario.php");
    require_once("../../../models/usuario/DAO.php");

    $idEditar   = json_decode(file_get_contents("php://input"));

    $idList = new ModelUsuario();

    $idList->setId($idEditar);

    $usuarioList = new Usuarios();

    echo $usuarioList->ListarUsuario($idList);