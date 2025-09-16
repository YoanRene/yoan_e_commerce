<?php
    class UsuariosModel extends Query{
        private $usuario;
        private $nombre;
        private $password;
        private $caja;
        private $id;

        public function __construct(){
            parent::__construct();
        }

        public function getUsuario(string $usuario, string $password){
            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$password'";
            return $this->select($sql);
        }

        public function getAllUsuarios(){
            $sql = "SELECT u.*, c.id as id_caja, c.caja FROM usuarios u INNER JOIN cajas c ON u.id_caja = c.id";
            return $this->selectAll($sql);
        }

        public function getCajas(){
            $sql = "SELECT * FROM cajas WHERE estado = 1 ";
            return $this->selectAll($sql);
        }

        public function registrarUsuarioM($usuario, $nombre, $password, $caja){
            $this->usuario = $usuario;
            $this->nombre = $nombre;
            $this->password = $password;
            $this->caja = $caja;

            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
            $data = $this->select($sql);
            if($data){
                $res="existe";
            }
            else{
                $sql = "INSERT INTO usuarios(usuario, nombre, clave, id_caja) VALUES (?, ?, ?, ?)";
                $datos = array($this->usuario, $this->nombre, $this->password, $this->caja);
                $data = $this->save($sql,$datos);
                if($data==1){
                    $res="ok";
                }
                else $res="error";

            }

            return $res;
        }

        public function editarUsuarioM($usuario, $nombre,$id_caja, $id){
            $this->usuario = $usuario;
            $this->nombre = $nombre;
            $this->caja = $id_caja;
            $this->id = $id;

            $sql = "UPDATE usuarios SET usuario = ?, nombre = ?, id_caja = ? WHERE id = ?";
            $datos = array($this->usuario, $this->nombre, $this->caja, $this->id);
            $data = $this->save($sql,$datos);

            if($data){
                $res="modificado";
            }
            else{
                $res="error";
            }

            return $res;
        }

        public function editarUsuario(int $id){
            $sql = "SELECT * FROM usuarios WHERE id = $id";
            return $this->select($sql);
        }
    }

?>