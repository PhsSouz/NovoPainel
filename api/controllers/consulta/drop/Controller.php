<?php

    require_once("../../../models/consulta/ModelConsulta.php");
    require_once("../../../models/consulta/DAO.php");

    $id = json_decode(file_get_contents("php://input"));

    $consulta = new ModelConsulta();

    $consulta->setId($id);

    $excluir = new Consulta();

    echo $excluir->Excluir($consulta);