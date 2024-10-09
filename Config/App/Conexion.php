<?php
class Conexion{
    private $conect;
    public function __construct()
    {
        $pdo = "mysql:=unix_socket=/cloudsql/tiendaonline-436721:us-central1:tiendaonline2024;dbname=".DB.";".CHARSET;
        try {
            $this->conect = new PDO($pdo, USER, PASS);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error en la conexion".$e->getMessage();
        }
    }
    public function conect()
    {
        return $this->conect;
    }
}
 
?>
