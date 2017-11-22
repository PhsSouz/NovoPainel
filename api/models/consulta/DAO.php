<?php
	require_once("../../../conexao/connect.php");
	require_once("ModelConsulta.php");
	
	class Consulta {

        public static $instance;

        public function __construct() {
            //
        }

        public static function getInstance() {
            if (!isset(self::$instance))
                self::$instance = new Consulta();

            return self::$instance;
        }

        public function Listar() {
            try {

                $stm = Conexao::getInstance()->prepare('SELECT * FROM Consulta');

                $stm->execute();

                $arrValues = $stm->fetchAll(PDO::FETCH_ASSOC);

                header('Content-Type: application/json');

                return json_encode($arrValues);
            } 
            catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação.";
            }
        }         

        public function ListarPaciente() {
            try {

                $stm = Conexao::getInstance()->prepare('SELECT * FROM Paciente');

                $stm->execute();

                $arrValues = $stm->fetchAll(PDO::FETCH_ASSOC);

                header('Content-Type: application/json');

                return json_encode($arrValues);
            } 
            catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação.";
            }
        }         

        public function ListarDentista() {
            try {

                $stm = Conexao::getInstance()->prepare('SELECT * FROM Dentista');

                $stm->execute();

                $arrValues = $stm->fetchAll(PDO::FETCH_ASSOC);

                header('Content-Type: application/json');

                return json_encode($arrValues);
            } 
            catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação.";
            }
        }         

        public function ListarEspec() {
            try {

                $stm = Conexao::getInstance()->prepare('SELECT * FROM Especialidade');

                $stm->execute();

                $arrValues = $stm->fetchAll(PDO::FETCH_ASSOC);

                header('Content-Type: application/json');

                return json_encode($arrValues);
            } 
            catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação.";
            }
        }

        public function Cadastrar(ModelConsulta $consulta) {
            try {
                $sql = "INSERT INTO Consulta (       
                    con_data,
                    con_hora,
                    con_tipo,
                    con_retorno,
                    Dentista_ID, 
                    Dentista_Especialidade_ID,
                    pac_idPac)
                    VALUES (
                    :data,
                    :hora,
                    :tipo,
                    :retorno,
                    :dentista,
                    :espec,
                    :idPac)";

                $p_sql = Conexao::getInstance()->prepare($sql);

                $p_sql->bindValue(":data",      $consulta->getData());
                $p_sql->bindValue(":hora",      $consulta->getHora());
                $p_sql->bindValue(":tipo",      $consulta->getTipo());
                $p_sql->bindValue(":retorno",   $consulta->getRetorno());
                $p_sql->bindValue(":dentista",  $consulta->getDentista());
                $p_sql->bindValue(":espec",     $consulta->getEspec());
                $p_sql->bindValue(":idPac",     $consulta->getIdpac());

                $result = $p_sql->execute();

                if(!$result ){    
                    echo(400);
                }
                else {
                    echo(200);
                } 

            } catch (Exception $e) 
            {
                echo $e->getMessage();
                print "Ocorreu um erro ao tentar executar esta ação";
            }
        }

        public function Excluir(ModelConsulta $consulta) {

            try {

                $sql = "DELETE FROM Consulta WHERE idConsulta = :id";

                $p_sql = Conexao::getInstance()->prepare($sql);

                $p_sql->bindValue(":id",  $consulta->getId());

                $result = $p_sql->execute();

                if(!$result ){    
                    echo(400);
                }
                else {
                    echo(200);
                } 

            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação.";
            }
        }

        public function Editar(ModelConsulta $consulta) {
            try {

                $stm = Conexao::getInstance()->prepare('SELECT * FROM Consulta WHERE idConsulta = :id');

                $stm->bindValue(":id",  $consulta->getId());

                $stm->execute();

                $arrValues = $stm->fetchAll(PDO::FETCH_ASSOC);

                header('Content-Type: application/json');

                return json_encode($arrValues);
            } 
            catch (Exception $e) {
                echo $e->getMessage();
                print "Ocorreu um erro ao tentar executar esta ação.";
            }    
        }

        public function Atualizar(ModelConsulta $consulta) {
            try {
                $sql = "UPDATE  Consulta 

                            set con_data = :data,
                                con_hora = :hora,
                                con_tipo = :tipo,
                                con_retorno = :retorno,
                                Dentista_ID = :dentista, 
                                Dentista_Especialidade_ID = :espec
                            where
                                idConsulta = :id";

                $p_sql = Conexao::getInstance()->prepare($sql);

                $p_sql->bindValue(":data",      $consulta->getData());
                $p_sql->bindValue(":hora",      $consulta->getHora());
                $p_sql->bindValue(":tipo",      $consulta->getTipo());
                $p_sql->bindValue(":retorno",   $consulta->getRetorno());
                $p_sql->bindValue(":dentista",  $consulta->getDentista());
                $p_sql->bindValue(":espec",     $consulta->getEspec());
                $p_sql->bindValue(":id",        $consulta->getId());

                $result = $p_sql->execute();

                if(!$result ){    
                    echo(400);
                }
                else {
                    echo(200);
                } 

            } catch (Exception $e) 
            {
                echo $e->getMessage();
                print "Ocorreu um erro ao tentar executar esta ação";
            }
        }  
    }