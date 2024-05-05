<?php
require_once ('conexion.php');

class Cuenta
{
    public static function mostrar_ci($ci)
    {
        global $conn_id;

        $sql = "SELECT * FROM cuenta WHERE ci = ?";

        $params = array($ci);

        $stmt = sqlsrv_query($conn_id, $sql, $params);

        if ($stmt === false) {
            echo "Error al obtener cuenta: " . print_r(sqlsrv_errors(), true);
            return [];
        } else {
            $cuentas = [];
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $cuentas[] = $row;
            }
            return $cuentas;
        }
    }
    public static function mostrar()
    {
        global $conn_id;

        $sql = "SELECT * FROM cuenta";

        $stmt = sqlsrv_query($conn_id, $sql);

        if ($stmt === false) {
            echo "Error al obtener cuentas: " . print_r(sqlsrv_errors(), true);
            return [];
        } else {
            $cuentas = [];
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $cuentas[] = $row;
            }
            return $cuentas;
        }
    }
}
?>