# Slim Framework Web API
Ejemplo con Slim Framework + PureCSS para crear una WEB con un menu de Home y Contacto + una API PUBLICA de ejemplo "/api/fruits" & "api/fruit/1"

# Test Example
* 1 - composer install (obtener carpeta vendor y descargar slim. twig y monolog);
* 2 - php -S localhost:8080 (en carpeta src/public de index.php);
* 3 - Crear carpeta y fichero con permisos de escritura para registrar logs de monolog: src/logs/app.log

# Heroku
* heroku login
* heroku create
* git push heroku master
* heroku ps:scale web=1
* heroku open

Ver demo: https://polar-mesa-88572.herokuapp.com/