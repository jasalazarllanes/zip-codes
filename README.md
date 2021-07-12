## Reto Backbone

Para llevar a cabo el reto, lo primero que se hizo fue analizar la información que se encontraba en correos de México. 
Una vez descargado el archivo txt, se realizó una prueba leyendo el archivo y armando la estructura solicitada en el reto, pero los tiempos de respuesta eran muy altos así que se optó por almacenar la información en una base de datos.

Se hizo una migración con laravel para crear la estructura de la tabla, después se generó un script; que se encuentra en el controllador ZipCodeController/import, para leer e importar la información a la tabla correspondiente.

Una vez teníendo la tabla, se genera el script para leer la información de esta recorriendo los datos y creando la estructura solicitada.

Los inconvenientes presentados fue que no se contaba con un servidor para hospedar el proyecto, se realizarón pruebas en servidores gratuitos como heroku y alwaysdata. Se utilizó una base de datos en postgresql para almacenar la información, ya que se obtuvieron mejores resultados al compararlos con una base de datos en MySql.