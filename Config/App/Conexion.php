<?php
    class Conexion{
        private $connect;
        public function __construct()
        {
            $pdo = "mysql:host=" .host.";dbname=" .db.";" .charset;
            try {
                $this->connect = new PDO($pdo, user, pass);
            } catch (Exception $e) {
                echo "Error en la conexión: " . $e->getMessage();
            }
        }

        public function conectar(){
            return $this->connect;
        }
    }
?>