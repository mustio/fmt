<?php
namespace FMT;

/**
 * Class FMT
 * @package FMT
 * Se debe instanciar en el inicio de  la aplicacion, para su implementacion (en bootstrap o index)
 */
class FMT
{
    static $roles;

    /**
     * @param $modulos
     * Id de Modulo/App
     */
    static function init($modulos){
        static::$roles = \FMT\Helper\Arr::get($modulos,'roles',false);
    }

}