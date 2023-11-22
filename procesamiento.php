<?php

////////////////////////
// CREADO POR LU9DCE
////////////////////////

// Obtener el contenido del archivo JSON de resultados
$resultados_json = file_get_contents('resultados.json');

// Decodificar el contenido JSON en un array asociativo
$base = json_decode($resultados_json, true);

// Función para buscar información basada en una licencia recortada
function locate($licrx)
{
    // Acceder a la variable global que contiene la información de la base de datos
    global $base;

    // Obtener la longitud de la licencia proporcionada
    $z = strlen($licrx);

    // Iterar a través de las posibles longitudes de licencia recortada
    for ($i = $z; $i >= 1; $i--) {
        // Obtener la parte recortada de la licencia
        $licencia_recortada = substr($licrx, 0, $i);

        // Iterar a través de la base de datos para encontrar coincidencias
        foreach ($base as $resultado) {
            // Crear una expresión regular para buscar la licencia recortada
            $expresion_regular = '/\b ' . $licencia_recortada . ' \b/';

            // Verificar si la expresión regular coincide con la licencia en el resultado actual
            if (preg_match($expresion_regular, $resultado['licencia'])) {
                // Devolver un array con la información correspondiente
                return array(
                    'id' => $resultado['id'],
                    'flag' => $resultado['flag'],
                    'name' => $resultado['name']
                );
            }
        }
    }

    // Devolver "unknown", indicando que no se encontró una coincidencia
    return array(
        'id' => 'unknown',
        'flag' => 'unknown',
        'name' => 'unknown'
    );
}

// Ejemplo imprimir el resultado de la función para la licencia 'NP3XF'
print_r(locate('NP3XF'));
?>
