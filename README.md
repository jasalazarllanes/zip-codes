## Reto Backbone

Para llevar a cabo el reto, lo primero que se hizo fue analizar la información que se encontraba en correos de México. 
Una vez descargado el archivo txt, se realizó una prueba en local, leyendo el archivo y armando la estructura solicitada en el reto, pero los tiempos de respuesta eran muy altos así que se optó por almacenar la información en una base de datos obteniendo mejores resultados.

- Se hizo una migración con laravel para crear la estructura de la tabla, después se generó un script; que se encuentra en el controllador ZipCodeController/import, para leer e importar la información a la tabla correspondiente.

- Una vez teníendo la tabla con toda la información del archivo txt, se genera el script para leer la información de esta tabla en el método ZipCodeController/zip_codes, recorriendo todos los registros y creando la estructura solicitada en el reto.

Se realizarón pruebas en servidores como heroku y alwaysdata, ya que no se contaba con un servidor óptimo para realizar las pruebas necesarias. Un detalle que se presentó fue que en los archivos de correos de México no venía el código del estado así que se tuvieron que actualizar manualmente.

El script usado para importar la base de datos fue utilizado solo localmente, una vez importada la información se exportó a una base de datos en la nube.
