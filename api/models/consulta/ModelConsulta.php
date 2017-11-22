<?php
    class ModelConsulta {
        private $id;
        private $data;
        private $hora;
        private $tipo;
        private $retorno;
        private $dentista;
        private $espec;
        private $idPac;

        //IdPac
        public function getIdpac() {
            return $this->idPac;
        }
        public function setIdpac($idPac) {
            $this->idPac = $idPac;
        }

        //Dent
        public function getEspec() {
            return $this->espec;
        }
        public function setEspec($espec) {
            $this->espec = $espec;
        }

        //Dent
        public function getDentista() {
            return $this->dentista;
        }
        public function setDentista($dentista) {
            $this->dentista = $dentista;
        }

        //retorno
        public function getRetorno() {
            return $this->retorno;
        }
        public function setRetorno($retorno) {
            $this->retorno = $retorno;
        }

        //tipo
        public function getTipo() {
            return $this->tipo;
        }
        public function setTipo($tipo) {
            $this->tipo = $tipo;
        }

        //hora
        public function getHora() {
            return $this->hora;
        }
        public function setHora($hora) {
            $this->hora = $hora;
        }

        //Id
        public function getId() {
            return $this->id;
        }
        public function setId($id) {
            $this->id = $id;
        }

        //Data
        public function getData() {
            return $this->data;
        }
        public function setData($data) {
            $this->data = $data;
        }
    }