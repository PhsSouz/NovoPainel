<?php
    class ModelUsuario {
        private $id;
        private $nome;
        private $sobrenome;
        private $email;
        private $senha;
        private $tipo;
        private $cpf;
        private $endereco;
        private $telefone;
        private $obs;
        private $nasc;

        //ID//
        public function getId() {
            return $this->id;
        }
        public function setId($id) {
            $this->id = $id;
        }
        //NOME//
        public function getNome() {
            return $this->nome;
        }
        public function setNome($nome) {
            $this->nome = $nome;
        }
        //SOBRENOME//
        public function getSobrenome() {
            return $this->sobrenome;
        }

        public function setSobrenome($sobrenome) {
            $this->sobrenome = $sobrenome;
        } 
        //EMAIL//
        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }
        //SENHA//
        public function getSenha() {
            return $this->senha;
        }
        public function setSenha($senha) {
            $this->senha = $senha;
        }         
        //TIPO//
        public function getTipo() {
            return $this->tipo;
        }
        public function setTipo($tipo) {
            $this->tipo = $tipo;
        }          
        //RG//
        public function getCpf() {
            return $this->cpf;
        }
        public function setCpf($cpf) {
            $this->cpf = $cpf;
        }
        //ENDERECO//
        public function getEndereco() {
            return $this->endereco;
        }
        public function setEndereco($endereco) {
            $this->endereco = $endereco;
        }        
        //TELEFONE//
        public function getTelefone() {
            return $this->telefone;
        }
        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }          

        //OBSERVAÇÃO//
        public function getObs() {
            return $this->obs;
        }
        public function setObs($obs) {
            $this->obs = $obs;
        }           

        //DATA DE NASC//
        public function getNasc() {
            return $this->nasc;
        }
        public function setNasc($nasc) {
            $this->nasc = $nasc;
        }        
    }