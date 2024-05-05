<?php
require_once ('persona_model.php');
require_once ('cuenta_model.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postdata = file_get_contents("php://input");
    if (!empty($postdata)) {
        // Decodificar el JSON recibido en un array asociativo
        $data = json_decode($postdata, true);

        // Verificar si se ha recibido el parámetro 'ci' en el JSON decodificado
        if (isset($data["ci"])) {
            // Obtener el valor del parámetro 'ci'
            $ci = $data["ci"];

            $resp = Cuenta::mostrar_ci($ci);
            print json_encode($resp);

        }
    }
} else {
    if (isset($_GET['ci'])) {
        $ci = $_GET['ci'];
        $resp = Persona::mostrar_ci($ci);
        print json_encode($resp);
    } else {
        $resp = Persona::mostrar();
        print json_encode($resp);
    }

}
exit;
?>