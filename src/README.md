# Framework en Desarrollo

## Implementación en el *Modelo*

```php
<?php
namespace App\Modelo;
use FMT\Modelo;
// https://github.com/cangelis/simple-validator
use \SimpleValidator\Validator; // Libreria para la Validacion de Datos
use \App\Helper\Conexion; // Clase para la conexion a la base de datos

class Marca extends Modelo {
  // Atributos
  // Metodos Abstractos
}

```

## Implementación en el *Controlador*


```php
<?php
namespace App\Controlador;
use FMT\Controlador;
use App\Modelo;

class Marca extends ControladorLocal {
    // Metodos
}


```