<?php
class Principal extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        
    }
    //vista 'sobre nosotros'
    public function about()
    {
        $data['title'] = 'Sobre Nosotros';
        $this->views->getView('Principal', "about", $data);
    }
    //vista 'Tienda'
    public function shop($page)
    {
        $pagina = (empty($page)) ? 1 : $page ;
        $porPagina = 9;
        $desde = ($pagina - 1) * $porPagina;
        $data['title'] = 'Nuestros Productos';
        $data['productos'] = $this ->model->getProductos($desde, $porPagina);
        $data['pagina'] = $pagina;
        $total = $this ->model->getTotalProductos();
        $data['total'] = ceil($total['total'] / $porPagina);
        $this->views->getView('Principal', "shop", $data);
    }
    //vista 'Detalles'
    public function detail($id_producto)
    {
        $data['producto'] = $this->model->getProducto($id_producto);
        $id_categoria = $data['producto']['id_categoria'];
        $data['relacionados'] = $this->model->getAleatorios($id_categoria, $data['producto']['id']);
        $data['title'] = $data['producto']['nombre'];
        $this->views->getView('Principal', "detail", $data);
    }
    //vista 'Categorias'
    public function categorias($datos)
    {
        $id_categoria = 1;
        $page = 1;
        $array = explode(',', $datos);
        if (isset($array[0])) {
            if(!empty($array[0])){
                $id_categoria = $array[0];
            }
        }
        if (isset($array[1])) {
            if(!empty($array[1])){
                $page = $array[1];
            }
        }
        $pagina = (empty($page)) ? 1 : $page ;
        $porPagina = 3;
        $desde = ($pagina - 1) * $porPagina;

        $data['pagina'] = $pagina;
        $total = $this ->model->getTotalProductosCat($id_categoria);
        $data['total'] = ceil($total['total'] / $porPagina);

        $data['productos'] = $this->model->getProductosCat($id_categoria, $desde, $porPagina);
        $data['title'] = 'Categorias';
        $data['id_categoria'] =  $id_categoria;
        $this->views->getView('Principal', "categorias", $data);
    }
    //vista 'Contacto'
    public function contact()
    {
        $data['title'] = 'Contactos';
        $this->views->getView('Principal', "contact", $data);
    }
    //vista 'Deseo'
    public function deseo()
    {
        $data['title'] = 'Tu Lista de deseos';
        $this->views->getView('Principal', "deseo", $data);
    }

    //Obtener productos apartir de la lista de carrito
    public function listaProductos() {
        $datos = file_get_contents('php://input');
        $json = json_decode($datos, true);
        $array['productos'] = array();
        $total = 0.00;
        foreach ($json as $producto) {
            $result = $this->model->getProducto($producto['idProducto']);
            $data['id'] = $result['id'];
            $data['nombre'] = $result['nombre'];
            $data['precio'] = $result['precio'];
            $data['cantidad'] = $producto['cantidad'];
            $data['imagen'] = $result['imagen'];
            $subTotal = $result['precio'] * $producto['cantidad'];
            $data['subTotal'] = number_format($subTotal, 2);
            array_push($array['productos'], $data);
            $total += $subTotal;
        }
        $array['total'] = number_format($total, 2);
        $array['moneda'] = MONEDA;
        echo json_encode($array, JSON_UNESCAPED_UNICODE);
        die();
    }
}