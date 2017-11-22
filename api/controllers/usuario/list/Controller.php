<?php

    require_once("../../../models/usuario/DAO.php");

    $usuarioList = new Usuarios();

    echo $usuarioList->Listar();
    
