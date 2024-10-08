<?php
class ProductosModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }
    public function getProductos($estado)
    {
        $sql = "SELECT * FROM productos WHERE estado = $estado";
        return $this->selectAll($sql);
    }

    public function getCategorias()
    {
        $sql = "SELECT * FROM categorias WHERE estado = 1";
        return $this->selectAll($sql);
    }

    public function registrar($nombre, $descripcion, $precio, $cantidad, $imagen, $categoria){
        $sql = "INSERT INTO productos (nombre, descripcion, precio, cantidad, imagen, id_categoria) VALUES (?,?,?,?,?,?)";
        $array = array($nombre, $descripcion, $precio, $cantidad, $imagen, $categoria);
        return $this->insertar($sql, $array);
    
    }
   

    public function eliminar($idUser){
        $sql = "UPDATE categorias SET estado = ? WHERE id = ?";
        $array = array(0, $idUser);
        return $this->save($sql, $array);
    }

    public function getCatoria($idCat)
    {
        $sql = "SELECT * FROM categorias WHERE id = $idCat";
        return $this->select($sql);
    }

    public function modificar($nombre, $apellido, $correo, $id){
        $sql = "UPDATE usuarios SET nombres=?, apellidos=?, correo=? WHERE id=?";
        $array = array($nombre, $apellido, $correo, $id);
        return $this->save($sql, $array);
    }
    public function modificarConClave($categoria, $imagen, $id)
{
    $sql = "UPDATE categorias SET categoria=?, imagen=? WHERE id=?";
    $array = array($categoria, $imagen, $id);
    return $this->save($sql, $array);
}

    
    
    

}
 
