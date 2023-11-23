<?php

////////////////////////
// CREADO POR LU9DCE
////////////////////////

// Nombre del archivo CSV que se va a leer
$archivo_csv = 'cty.csv';

// Abrir el archivo en modo lectura
$archivo = fopen($archivo_csv, 'r');

// Inicializar un array para almacenar los resultados
$resultados = array();

// Leer el archivo CSV línea por línea
while (($fila = fgetcsv($archivo)) !== false) {
    // Realizar el reemplazo de caracteres no deseados en la columna 10 del CSV
    $aa = str_replace(';', '', $fila[9]);
    $aa = str_replace('=', '', $aa);

    // Almacenar los datos relevantes en el array de resultados
    $resultados[] = array(
        'licencia' => $fila[1] . ' ' . $aa,
        'id' => $fila[2]
    );
}

// Cerrar el archivo CSV
fclose($archivo);

// Obtener el contenido del archivo JSON que contiene datos de DXCC
$dxcc_data = file_get_contents('dxcc.json');
// Decodificar el contenido JSON en un array asociativo
$dxcc_array = json_decode($dxcc_data, true);

// Iterar a través de los resultados y buscar información adicional en el array DXCC
foreach ($resultados as &$resultado) {
    $id = $resultado['id'];
    $encontrado = false;

    // Buscar el ID correspondiente en el array DXCC
    foreach ($dxcc_array as $dxcc_item) {
        if ($dxcc_item['id'] == $id) {
            // Asignar la bandera y el nombre correspondientes si se encuentra la coincidencia
            $resultado['flag'] = $dxcc_item['flag'];
            $resultado['name'] = $dxcc_item['name'];
            $encontrado = true;
            break;
        }
    }

    // Si no se encuentra una coincidencia, asignar valores predeterminados
    if (!$encontrado) {
        $resultado['flag'] = 'unknown';
        $resultado['name'] = 'unknown';
    }
}

// Convertir el array de resultados a formato JSON con formato bonito y escribirlo en un archivo
$resultados_json = json_encode($resultados, JSON_PRETTY_PRINT);
file_put_contents('resultados.json', $resultados_json);
?>
