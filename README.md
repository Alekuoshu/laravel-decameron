# Laravel Decameron

Este proyecto es de prueba para practicar nuevos conocimientos, proyecto de busqueda, posteo de empleos de desarrollo.

## Instalación

Clona este repositorio y ejecuta el comando `composer install` desde el root del proyecto, para asegurarte de que todas las dependencias estén instaladas.

Ejecuta `php artisan optimize:clear && php artisan cache:clear && php artisan route:clear && php artisan config:clear` para limpiar la cache.

## Despliegue

1. Ejecuta el comando `php artisan serve` para levantar un servidor de desarrollo.

2. Tambien puedes subir el proyecto completo a tu servidor o hosting. Y los archivos estáticos están en la carpeta `public` se deben copiar hacia la carpeta public_html, esto en el caso de que sea en un hosting con cpanel. Hay otros servidores que hacen el trabajo mas automatizado y es solo de seguir las instrucciones.

3. Editar el `.env` para configurar la conexión a la base de datos y la url del proyecto. Por ejemplo:

   `DB_CONNECTION=pgsql`

   `DB_HOST=postgres`

   `DB_PORT=5432`

   `DB_DATABASE=decameron`

   `DB_USERNAME=postgres`

   `DB_PASSWORD=your-password`

   `APP_URL=http://decameron.test`

4. Configura el servidor web para que apunte a la carpeta `public o public_html` como raíz. Por ejemplo con Apache, puedes crear un archivo `decameron.conf` en la carpeta `sites-available` con el siguiente contenido:

   `<VirtualHost \*:80>`

   `ServerName decameron.test`

   `DocumentRoot /var/www/decameron/public`

   `<Directory /var/www/decameron/public>`

   `AllowOverride All`

   `</Directory>`

   `</VirtualHost>`

5. Habilita el sitio en tu servidor web.

6. Reinicia el servidor web para que los cambios se aplicen.

7. Crea la base de datos, en tu servidor o hosting y asegurate de colocarle el mismo nombre que en `.env`, por ejemplo: `DB_DATABASE=decameron`.

8. Instala la base de datos con el comando `php artisan migrate:fresh --seed` desde el directorio del proyecto. Esto creara la base de datos y las tablas necesarias. (En caso de que no lo logren hacer por alli, les dejare un archivo .sql con las tablas listo para instalar.)

9. Accede a tu proyecto en `http://decameron.test` por ejemplo.

## Desarrollo

El proyecto esta desarrollado con Laravel. Es una api para ser consumida desde React.

### URL Principal:

- https://dev.koshucasweb.com/

### Las URLs de las APIs:

- https://dev.koshucasweb.com/api/hoteles : Esta esta publica, para poder acceder sin permisos

- https://dev.koshucasweb.com/api/habitaciones : Esta esta priivada y solo se puede accerder por un token valido.

  Se realizó de esta manera para mostrar mis habilidades de varias maneras.

  Se crearon 2 endpoints para las APIs, una para obtener los hoteles y otra para obtener las habitaciones. Las mismas tienen sus respectivos controladores y modelos. Adicional cada una tiene sus endpoint para CRUD: post, get, put, delete.

  Por otro lado, se crearon 2 tablas para las APIs: `hoteles` y `habitaciones`. Estas tablas estan relacionadas de uno a muchos (Un hotel puede tener muchas habitaciones, y una habitación pertenece a un hotel).

## Documentación

- [Documentación de Laravel](https://laravel.com/docs/9.x)

## Desarrollador

- [Alejandro Villegas](https://github.com/Alekuoshu)

## Estructura del proyecto

- `app`: Contiene el código fuente de la aplicación.
  - `Controllers`: Controladores de la aplicación.
  - `Models`: Modelos de la aplicación.
  - `Requests`: Solicitudes de la aplicación.
  - `Resources`: Recursos de la aplicación.
  - `Views`: Vistas de la aplicación.
- `config`: Configuración de la aplicación.
- `database`: Base de datos de la aplicación.
- `public`: Contiene los archivos estáticos de la aplicación.
- `routes`: Rutas de la aplicación.

## Contribución

Si deseas contribuir a este proyecto, puedes hacerlo de las siguientes maneras:

- Reportar bugs o errores en el repositorio.
- Crear un pull request con una nueva característica o mejora.
- Ayudar a mejorar la documentación.

## Licencia

Este proyecto está bajo la licencia MIT.
