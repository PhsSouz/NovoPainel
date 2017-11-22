<?php

    require_once("../../../models/consulta/ModelConsulta.php");
    require_once("../../../models/consulta/DAO.php");

    $data = json_decode(file_get_contents("php://input"));

    $consulta = new ModelConsulta();

    $consulta->setData($data->con_data);
    $consulta->setHora($data->con_hora);
    $consulta->setTipo($data->con_tipo);
    $consulta->setRetorno($data->con_retorno);
    $consulta->setDentista($data->Dentista_ID);
    $consulta->setEspec($data->Dentista_Especialidade_ID);
    $consulta->setIdpac($data->pac_idPac);

    $cadastro = new Consulta();

    echo $cadastro->Cadastrar($consulta);