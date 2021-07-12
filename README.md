## Reto Backbone

Para llevar a cabo el reto, lo primero que se hizo fue analizar la información que se encontraba en correos de México. 
Una vez descargado el archivo txt, se realizó una prueba en local, leyendo el archivo y armando la estructura solicitada en el reto, pero los tiempos de respuesta eran muy altos así que se optó por almacenar la información en una base de datos.

- Se hizo una migración con laravel para crear la estructura de la tabla, después se generó un script; que se encuentra en el controllador ZipCodeController/import, para leer e importar la información a la tabla correspondiente.

- Una vez teníendo la tabla con toda la información del archivo txt, se genera el script para leer la información de esta tabla en el método ZipCodeController/zip_codes, recorriendo todos los registros y creando la estructura solicitada en el reto.

Los inconvenientes presentados fue que no se contaba con un servidor para hospedar el proyecto. Se realizarón pruebas en servidores gratuitos como heroku y alwaysdata y se utilizó una base de datos en postgresql para almacenar la información, ya que se obtuvieron mejores resultados al compararlos con una base de datos en MySql. El otro detalle fue que en los archivos de correos de México no venía el código del estado.