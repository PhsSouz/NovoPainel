<?php
    require_once("../../../models/consulta/ModelConsulta.php");
    require_once("../../../models/consulta/DAO.php");

    $data = json_decode(file_get_contents("php://input"));


    $explode = explode("-", $data->con_data);

    $dia = explode("T", $explode[2]);


    $ano = $explode[0].'-'.$explode[1].'-'.$dia[0];

    $consulta = new ModelConsulta();

    $consulta->setData($ano);
    $consulta->setHora($data->con_hora);
    $consulta->setDentista($data->Dentista_ID);

    $cadastro = new Consulta();

    echo $cadastro->ValidaConsulta($consulta);