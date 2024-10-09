<?php
class Conexion {
    private $conect;

    public function __construct() {
        // Nombre de la conexión de Cloud SQL
        $connection_name = 'tiendaonline-436721:us-central1:tiendaonline2024';
        // Nombre de la base de datos
        $dbname = 'tienda_online'; // Reemplaza con tu base de datos
        // Usuario y contraseña de la base de datos
        $username = 'root';               // Reemplaza con tu usuario de la base de datos
        $password = 'administracion2024';            // Reemplaza con tu contraseña de la base de datos

        // Configuración del DSN para usar el socket UNIX
        $dsn = sprintf(
            'mysql:unix_socket=/cloudsql/tiendaonline-436721:us-central1:tiendaonline',
            $connection_name,
            $dbname
        );

        try {
            // Crear la conexión usando PDO
            $this->conect = new PDO($dsn, $username, $password);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexión exitosa a la base de datos";
        } catch (PDOException $e) {
            // Manejar los errores de conexión
            echo "Error en la conexión: " . $e->getMessage();
        }
    }

    public function conect() {
        return $this->conect;
    }
}
?>
