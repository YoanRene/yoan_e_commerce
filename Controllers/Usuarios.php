<?php
    class Usuarios extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }

        public function index(){
            $data['cajas'] = $this->model->getCajas();
            $this->views->getView($this,"index",$data);
        }

        public function listar(){ 
            $data = $this->model->getAllUsuarios();

            for ($i=0; $i < count($data); $i++) {
                if ($data[$i]['estado'] == 1) {
                    $data[$i]['estado'] = '<span class="badge bg-success">Activo</span>';
                }
                else{
                    $data[$i]['estado'] = '<span class="badge bg-danger">Inactivo</span>';
                }

                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" onclick="btnEditar('.$data[$i]['id'].')">Editar</button>
                <button class="btn btn-danger">Eliminar</button>
                </div>';
            }

            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            die();
        }

        public function validar(){
            if(empty($_POST['usuario']) || empty($_POST['password'])){
                echo "No se ingresaron datos";
            }
            else{
                $data=$this->model->getUsuarios($_POST['usuario'],$_POST['password']);
                if($data){
                    $_SESSION['id']=$data['id'];
                    $_SESSION['usuario']=$data['usuario'];
                    $_SESSION['clave']=$data['clave'];
                    $msg="ok";
                }
                else{
                    $msg="error";
                }
            }
            echo json_encode($msg,JSON_UNESCAPED_UNICODE);
            die(); 
        }

        public function registrar(){
            $usuario = $_POST['usuario'];
            $nombre = $_POST['nombre'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $caja = $_POST['Caja'];
            $id = $_POST['id'];
            $hash = hash('sha256', $password);
            if(empty($usuario) || empty($nombre) || empty($caja)){
                $msg = "No se ingresaron datos";
            }
            
            else{
                if($id == ""){
                    if($password != $password2){
                        $msg = "Las contraseñas no coinciden";
                    }
                    else{
                        $data=$this->model->registrarUsuarioM($usuario,$nombre,$hash,$caja);
                        if($data=="ok"){
                            $msg="si";
                        }
                        else if($data=="existe"){
                            $msg="El usuario ya existe";
                        }
                        else{
                            $msg="Error al registrar usuario";
                        }
                    }
                }
                else{
                    $data=$this->model->editarUsuarioM($usuario,$nombre,$caja,$id);
                    if($data=="modificado"){
                        $msg="modificado";
                    }
                    else{
                        $msg="Error al editar usuario";
                    }
                }
            }
            
            echo json_encode($msg,JSON_UNESCAPED_UNICODE);
            die();
        }

        public function editar($id){
            $data=$this->model->editarUsuario($id);
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            die();
        }
    }
?> 