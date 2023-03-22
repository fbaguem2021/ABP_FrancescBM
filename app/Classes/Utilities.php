<?php

namespace App\Classes;

use Illuminate\Database\QueryException;

class Utilities { 
    /**
     * Función que retorna un mensaje de error para la excepción recivida
     * 
     * @param Illuminate\Database\QueryException $exception
     * @return string
     */
    public static function errorMessage(QueryException $exception) {
        if (!empty($exception->errorInfo[1])) {
            switch($exception->errorInfo[1]) {
                case '1062':
                    $mensaje = 'Registro duplicado';
                    break;
                case '1451':
                    $mensaje = 'Registro con elementos relacionados';
                    break;
                default:
                    $mensaje = $exception->errorInfo[1] . ' - ' . $exception->errorInfo[2];
                    break;
            }
        } else {
            switch ($exception->getCode()) {
                case 1044:
                    $mensaje = "Usuario y/o password incorrecto";
                    break;
                case 1049:
                    $mensaje = "Base de datos desconocida";
                    break;
                case 2002:
                    $mensaje = "No se encuentra el servidor";
                    break;
                default:
                    $mensaje = $exception->getCode() . ' - ' . $exception->getMessage();
                    break;
            }
        }
        return $mensaje;
    }

    /**
     * Aquesta funció comprova el id del cicle per a saver si 
     * es el que estava sel·leccionat avants de recargar la pàgina
     * 
     * @param int $old
     * @param int $id
     * @return string
     */
    public static function checkCombo($old, $id) {
        return ($old == $id) ? 'selected' : '';
    }
    public static function checkBuscadorCheck($old='') {
        return ($old == 'actiu') ? 'checked' : '';
    }
    public static function checkRadio($value, bool $radiovalue) {
        return $value == $radiovalue;
    }
    public static function createRadio($cicle, $radiovalue) {
        if ($cicle->actiu == $radiovalue) {
            return "checked";
        }
    }
    public static function reloadRadio($old, $radiovalue) {
        if ($old == $radiovalue) {
            return "checked";
        }
    }
}