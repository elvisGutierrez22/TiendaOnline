<?php
class Productos extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
//codigo limpio
    public function index()
    {
        $data['title'] = 'productos';
        $data['categorias'] = $this->model->getCategorias();

        $this->views->getView('admin/productos', "index", $data);
    }

    public function listar()
    {
        $data = $this->model->getProductos(1);
        for ($i = 0; $i < count($data); $i++) {
             $data[$i]['imagen'] = '<img class="img-thumbnail" src="'.$data[$i]['imagen'] .'" alt="'.$data[$i]['nombre'] .'" width="50">';
            $data[$i]['accion'] = '<div class="d-flex">
            <button class="btn btn-primary" type="button" onclick="editCat(' . $data[$i]['id'] . ')"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger" type="button" onclick="eliminarCat(' . $data[$i]['id'] . ')"><i class="fas fa-trash"></i></button>
            </div>';
        }
        echo json_encode($data);
        die();
    }

    public function registrar()
    {
        if (isset($_POST['nombre']) &&  isset($_POST['precio'])) {
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $cantidad= $_POST['cantidad'];
            $descripcion= $_POST['descripcion'];
            $categoria = $_POST['categoria'];
            $imagen= $_FILES['imagen'];
            $tmp_name = $imagen['tmp_name'];
            $id = $_POST['id'];
            $ruta = 'assets/images/productos/';
            $nombreImg = date('YmdHis');
    
            if (empty($nombre) || empty($precio) || empty($cantidad)) {
                $respuesta = array('msg' => 'Todos los campos son requeridos', 'icono' => 'warning');
            } else {
                if (!empty($imagen['name'])) {
                    $destino = $ruta . $nombreImg . '.jpg';
                } else if (!empty($_POST['imagen_actual']) && empty($imagen['name'])) {
                    $destino = $_POST['imagen_actual'];
                } else {
                    $destino = $ruta . 'default.png';
                }
    
                if (empty($id)) {
                    $data = $this->model->registrar($nombre, $descripcion, $precio, $cantidad, $destino, $categoria);
                    if ($data > 0) {
                        if (!empty($imagen['name'])) {
                            move_uploaded_file($tmp_name, $destino);
                        }
                        $respuesta = array('msg' => 'Producto  registrado', 'icono' => 'success');
                    } else {
                        $respuesta = array('msg' => 'Error al registrar el producto', 'icono' => 'warning');
                    }
                } else {
                    $data = $this->model->modificarConClave($categoria, $destino, $id);
                    if ($data == 1) {
                          if (!empty($imagen['name'])) {
                                move_uploaded_file($tmp_name, $destino);
                            }
                        $respuesta = array('msg' => 'Categoría modificada', 'icono' => 'success');
                    } else {
                        $respuesta = array('msg' => 'Error al modificar la categoría', 'icono' => 'warning');
                    }
                }
            }
            echo json_encode($respuesta);
        }
        die();
    }
    


    public function delete($idCat)
    {
        if (is_numeric($idCat)) {
            $data = $this->model->eliminar($idCat);
            if ($data == 1) {
                $respuesta = array('msg' => 'Categoria dado de baja', 'icono' => 'success');
            } else {
                $respuesta = array('msg' => 'Error al eliminar', 'icono' => 'warning');
            }
        } else {
            $respuesta = array('msg' => 'ID de usuario no válido', 'icono' => 'warning');
        }

        echo json_encode($respuesta);
        die();
    }
    //editar usuario
    public function edit($idCat)
    {
        if (is_numeric($idCat)) {
            $data = $this->model->getCatoria($idCat);
            if ($data) {
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            } else {
                echo json_encode(['msg' => 'No se encontró la categoría', 'icono' => 'warning']);
            }
        } else {
            echo json_encode(['msg' => 'ID no válido', 'icono' => 'warning']);
        }
        die();
    }
    
}
