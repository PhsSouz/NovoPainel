<?php

    require_once("../../../models/usuario/ModelUsuario.php");
    require_once("../../../models/usuario/DAO.php");

    $idDeletar    = json_decode(file_get_contents("php://input"));

    $usuarioDeletar = new ModelUsuario();

    $usuarioDeletar->setId($idDeletar);

    $deletar = new Usuarios();

    echo $deletar->Deletar($usuarioDeletar);