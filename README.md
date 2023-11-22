# Script de Procesamiento de Licencias de Radioaficionados

Este conjunto de scripts PHP está diseñado para procesar información de licencias de radioaficionados, realizar búsquedas basadas en licencias recortadas y generar archivos JSON con información ampliada.

usa la funcion locate('NP3XF') por ejemplo y se optine 

```bash
Array
(
    [id] => 202
    [flag] => PR
    [name] => PUERTO RICO
)
```
de esta manera podra usarlo para optener el pais y la bandera, en la carpeta flag te dejo algunas para que puedas probar

ten en cuenta que estos script son para que crees o modifiques a tu gusto asi que tomalos de ejemplos

## Desarrollador

- **Nombre:** LU9DCE
- **Contacto:** [Correo Electrónico](mailto:hellocodelinux@gmail.com)

## PARA QUE?

Esto genera una archivo json que contiene informacion conjunta de cty.cvs y dxcc.json, el cual te devuelve los datos de acuerdo a la licencia a buscar 

## Uso

### 1. Procesar la Base de Datos de Licencias

El primer script (`generar_base.php`) lee un archivo CSV de licencias de radioaficionados y un archivo JSON con datos DXCC. Luego, genera un archivo JSON (`resultados.json`) con información adicional de cada licencia.

```bash
php generar_base.php
```

### 2. Buscar Información por Licencia

El segundo script (`procesamiento.php`) permite buscar información de licencias en la base de datos procesada.

```bash
php procesamiento.php 
```

Este comando devolverá información detallada sobre la licencia proporcionada.

## Notas Adicionales

- Asegúrate de tener los archivos `cty.csv` y `dxcc.json` en el mismo directorio que los scripts antes de ejecutarlos.
- Los resultados de la búsqueda se imprimen en la consola.

