<?php
	require_once("../../../conexao/connect.php");
	require_once("ModelUsuario.php");
	
	class Usuarios {

        public static $instance;

        public function __construct() {
            //
        }

        public static function getInstance() {
            if (!isset(self::$instance))
                self::$instance = new Usuarios();

            return self::$instance;
        }

        public function Inserir(ModelUsuario $usuario) {

            try {
                $sql = "INSERT INTO Usuario (       
                    email,
                    endereco,
                    nome,
                    cpf,
                    senha, 
                    telefone,
                    sobrenome,
                    tipo)
                    VALUES (
                    :email,
                    :endereco,
                    :nome,
                    :cpf,
                    :senha,
                    :telefone,
                    :sobrenome,
                    :tipo)";

                $p_sql = Conexao::getInstance()->prepare($sql);

                $p_sql->bindValue(":email",     $usuario->getEmail());
                $p_sql->bindValue(":endereco",  $usuario->getEndereco());
                $p_sql->bindValue(":nome",      $usuario->getNome());
                $p_sql->bindValue(":cpf",       $usuario->getCpf());
                $p_sql->bindValue(":senha",     $usuario->getSenha());
                $p_sql->bindValue(":telefone",  $usuario->getTelefone());
                $p_sql->bindValue(":sobrenome", $usuario->getSobrenome());
                $p_sql->bindValue(":tipo",      $usuario->getTipo());

                $result = $p_sql->execute();

                if(!$result ){    
                    var_dump( 
                        $cadastrar->errorInfo()
                    );    
                    exit;
                }
                else {
                    try {

                            $sql = "SELECT * FROM Usuario WHERE email = :email";

                            $stm = Conexao::getInstance()->prepare($sql);
                            $stm->bindValue(":email",     $usuario->getEmail());

                            $stm->execute();

                            $arrValues = $stm->fetchAll(PDO::FETCH_ASSOC);

                            header('Content-Type: application/json');
                            
                            return json_encode($arrValues);
                    } 
                    catch (Exception $e) {
                        echo $e->getMessage();
                        print "Ocorreu um erro ao tentar selecionar o Usuario.";
                    }

                } 

            } catch (Exception $e) 
            {
                echo $e->getMessage();
                print "Ocorreu um erro ao tentar executar esta ação";
            }
        }        

        public function InserirPaciente(ModelUsuario $usuario) {
            try {
                $sql = "INSERT INTO Paciente (		
                    Usuario_idUsuario,
                    pac_nome,
                    pac_telefone,
                    pac_end, 
                    pac_datanasc, 
                    pac_obs)
                    VALUES (
                    :id,
                    :nome,
                    :telefone,
                    :endereco,
                    :nasc,
                    :obs)";

                $p_sql = Conexao::getInstance()->prepare($sql);

                $p_sql->bindValue(":id",        $usuario->getId());
                $p_sql->bindValue(":nome",      $usuario->getNome());
                $p_sql->bindValue(":endereco",  $usuario->getEndereco());
                $p_sql->bindValue(":nasc",  $usuario->getNasc());
                $p_sql->bindValue(":obs",       $usuario->getObs());
                $p_sql->bindValue(":telefone",  $usuario->getTelefone());

                $result = $p_sql->execute();

                if(!$result ){    
                    var_dump( 
                        $cadastrar->errorInfo()
                    );    
                    exit;
                }
                else {
                    echo('200');
                } 

            } catch (Exception $e) 
            {
                echo $e->getMessage();
                print "Ocorreu um erro ao tentar executar esta ação";
            }
        }

        public function Deletar(ModelUsuario $usuario) {

            try {

                $sql = "DELETE FROM Usuario WHERE id = :id";

                $p_sql = Conexao::getInstance()->prepare($sql);

                $p_sql->bindValue(":id",  $usuario->getId());

                $result = $p_sql->execute();

                if(!$result ){    
                    var_dump( 
                        $deletar->errorInfo()
                    );    
                    exit;
                }
                else {
                    echo('200');
                } 

            } catch (Exception $e) {

                print "Ocorreu um erro ao tentar executar esta ação.";
            }
        }    

        public function Listar() {

            try {

                $stm = Conexao::getInstance()->prepare('SELECT  id,
                                                                nome,
                                                                sobrenome,
                                                                endereco,
                                                                email,
                                                                cpf,
                                                                tipo 
                                                        FROM Usuario');
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

        public function ListarUsuario(ModelUsuario $usuario) {

            try {

                $stm = Conexao::getInstance()->prepare('SELECT * FROM Usuario WHERE id = :id');

                $stm->bindValue(":id",  $usuario->getId());

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

        public function listarPacientes(ModelUsuario $usuario) {

            try {

                $stm = Conexao::getInstance()->prepare('SELECT * FROM Usuario WHERE id = :id');

                $stm->bindValue(":id",  $usuario->getId());

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

        public function Editar(ModelUsuario $usuario) {
            try {
                $sql = "UPDATE  Usuario

                            set nome        =   :nome, 
                                sobrenome   =   :sobrenome, 
                                email       =   :email, 
                                senha       =   :senha, 
                                endereco    =   :endereco, 
                                cpf         =   :cpf, 
                                telefone    =   :telefone, 
                                tipo        =   :tipo
                            where 
                                id = :id";

                $stm = Conexao::getInstance()->prepare($sql);

                $stm->bindValue(":id",        $usuario->getId());
                $stm->bindValue(":nome",      $usuario->getNome());
                $stm->bindValue(":sobrenome", $usuario->getSobrenome());
                $stm->bindValue(":email",     $usuario->getEmail());
                $stm->bindValue(":senha",     $usuario->getSenha());
                $stm->bindValue(":endereco",  $usuario->getEndereco());
                $stm->bindValue(":cpf",       $usuario->getCpf());
                $stm->bindValue(":telefone",  $usuario->getTelefone());
                $stm->bindValue(":tipo",      $usuario->getTipo());

                $result = $stm->execute();

                if(!$result ){    
                    var_dump( 
                        $edicao->errorInfo()
                    );    
                    exit;
                }
                else {
                    echo('200');
                } 

            } 
            catch (Exception $e) {
                echo $e->getMessage();
                print "Ocorreu um erro ao tentar executar esta ação.";
            }
    }
}
