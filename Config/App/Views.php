<?php
class Views {
    public function getView($ruta, $vista, $data="") {
        // Construcción de la ruta completa
        $vista = "Views/" . $ruta . "/" . $vista . ".php";

        // Verificar si la vista existe antes de incluirla
        if (file_exists($vista)) {
            require $vista;
        } else {
            // Mostrar un mensaje de error si el archivo no existe
            echo "Error: la vista $vista no fue encontrada.";
        }
    }
}
?>
