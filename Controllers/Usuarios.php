<?php
class Usuarios extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }

    public function index() {
        $data['title'] = 'usuarios';
        $this->views->getView('admin/usuarios', "index", $data);
    }

    public function listar() {
        $data = $this->model->getUsuarios(1);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['accion'] = '<div class="d-flex">
                <button class="btn btn-primary" type="button"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="eliminarUser(' . $data[$i]['id'] . ')"><i class="fas fa-trash"></i></button>
            </div>';
        }
        echo json_encode($data);
        die();
    }

    public function registrar() {
        if (isset($_POST['nombre'])) {
            if (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['correo']) || empty($_POST['clave'])) {
                $respuesta = array('msg' => 'Todos los campos son requeridos', 'icono' => 'warning');
            } else {
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $correo = $_POST['correo'];
                $clave = $_POST['clave'];
                $hash = password_hash($clave, PASSWORD_DEFAULT);

                // Verificar si el correo ya existe
                $result = $this->model->verificarCorreo($correo);
                if (empty($result)) {
                    $data = $this->model->registrar($nombre, $apellido, $correo, $hash);

                    if ($data > 0) { 
                        $_SESSION['email'] = $correo; 
                        $respuesta = array('msg' => 'Usuario registrado', 'icono' => 'success');
                    } else {
                        $respuesta = array('msg' => 'Error al registrar', 'icono' => 'warning');
                    }
                } else {
                    
                    $respuesta = array('msg' => 'El correo ya existe', 'icono' => 'warning');
                }
            }
            echo json_encode($respuesta); 
        }
        die(); 
    }

    
    public function delete($idUser) {
        if (is_numeric($idUser)) {
            $data = $this->model->eliminar($idUser);
            if ($data == 1) {
                $respuesta = array('msg' => 'Usuario dado de baja', 'icono' => 'success');
            } else {
                $respuesta = array('msg' => 'Error al eliminar', 'icono' => 'warning');
            }
        } else {
            $respuesta = array('msg' => 'ID de usuario no válido', 'icono' => 'warning');
        }

        echo json_encode($respuesta);
        die();
    }
}
