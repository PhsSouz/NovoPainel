<?php
	require_once("../../../conexao/connect.php");
	require_once("ModelUsuario.php");
	
	class Login {

        public static $instance;

        public function __construct() {
            //
        }

        public static function getInstance() {
            if (!isset(self::$instance))
                self::$instance = new Login();

            return self::$instance;
        }

        public function Logar(ModelUsuario $usuario) {
            
            session_start();

            $login = $usuario->getEmail();
            $senha = $usuario->getSenha();

            try {

                $stm = Conexao::getInstance()->prepare('SELECT * FROM Usuario WHERE  email = :email && senha = :senha');

                $stm->bindValue(":email",  $usuario->getEmail());
                $stm->bindValue(":senha",  $usuario->getSenha());

                $stm->execute();

                $arrValues = $stm->fetchAll(PDO::FETCH_ASSOC);

                header('Content-Type: application/json');

                if($arrValues > 0){
                    $_SESSION['login'] = $login;
                    $_SESSION['senha'] = $senha;

                    return json_encode($arrValues);
                }else{
                    unset ($_SESSION['login']);
                    unset ($_SESSION['senha']);
                    
                    echo "404";
                }

            } 
            catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação.";
            }
        }
    }