<?php
    require_once("../../../models/consulta/DAO.php");

    $consultaList = new Consulta();

	echo $consultaList->Listar();