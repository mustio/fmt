<?php

namespace FMT;

/**
 * Class Roles
 * @package FMT
 *
/**
 * Modo de Empleo
 * Para el funcionamiento correcto debera implementar el siguiente bloque en un archivo php dentro del Modelo.
 * A continuacion se deja un ejemplo de como implementarlo *
 *
use FMT\Roles;

class {{{Nombre_Clase}}} extends Roles
{
    static $permisos = [
        3 => [
            'nombre'=> 'Solo Lectura',
            'permisos'=> [
            'Test'=>['listar'=>1, 'ver'=>1 ]]
        ],
        2 => [
            'nombre'=> 'Usuario',
            'permisos'=> ['Test'=>['listar'=>1,'alta'=>1,'modificar'=>1,'borrar'=>1]]
        ],
        1 => [
            'nombre'=> 'Admin',
            'padre' => 2, 'permisos'=> ['Test'=>['alta'=>1,'modificar'=>1,'borrar'=>1]]
        ]
        ];
}
 * Se implementa dentro del atributo estatico

        static $permisos = [

            [rol] => [
                'nombre' => [nombre_de_rol],
                'permisos' => [aca se setean los permisos para cada seccion dentro del rol]
            ];

 * Si en el caso se seteara la clave 'padre', hace referencia a un rol que quiere ser hija de ese padre.
 * Ejemplo:
 *
    1 => [
        'nombre'=> 'Admin',
        'padre' => 2,
        ]
    ];

 * En este caso el rol 1 llamado 'Admin' tiene como padre el rol 2 (Hereda permisos).

 *
 * Caso que el Usuario no tenga permisos, a dicha seccion (por ejemplo), mostrara un error que debera ser sobreescrito
 * por el desarrollador, de acuerdo a los requerimientos del proyecto en el que esta trabajando.
 *
 */

	abstract class Roles
    {
        static $permisos = [];

        static function puede($cont, $accion)
        {
            $rol =  Usuarios::$usuarioLogueado['permiso'];

            while (true) {
                if (isset(FMT::$roles[$rol]['permisos'][$cont][$accion])) {
                    return FMT::$roles[$rol]['permisos'][$cont][$accion];
                }
                if (isset(FMT::$roles[$rol]['padre'])) {
                    $rol = FMT::$roles[$rol]['padre'];
                } else {
                    break;
                }
            }
            return false;
        }

        static function sin_permisos($accion)
        {
            return "No tiene permisos para usar " . $accion;
        }
    }