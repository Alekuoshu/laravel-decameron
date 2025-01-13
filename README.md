# Laravel Decameron

Este proyecto es de prueba para practicar nuevos conocimientos, proyecto de busqueda, posteo de empleos de desarrollo.

## Instalación

Clona este repositorio y ejecuta `npm install` para instalar las dependencias.

Ejecuta el comando `composer install` para asegurarte de que todas las dependencias estén instaladas.

Ejecuta `php artisan optimize:clear && php artisan cache:clear && php artisan route:clear && php artisan config:clear` para limpiar la cache.

## Despliegue

1. Ejecuta `npm run build` para compilar el proyecto.

2. Copia el contenido de la carpeta `dist` a tu servidor o hosting.

3. Editar el `.env` para configurar la conexión a la base de datos y la url del proyecto. Por ejemplo:

   `DB_CONNECTION=pgsql`

   `DB_HOST=postgres`

   `DB_PORT=5432`

   `DB_DATABASE=decameron`

   `DB_USERNAME=postgres`

   `DB_PASSWORD=your-password`

   `APP_URL=http://decameron.test`

4. En el servidor, crea una carpeta para el proyecto y copia la carpeta `dist` en ella.

5. Configura el servidor web para que apunte a la carpeta `dist` como raíz. Por ejemplo con Apache, puedes crear un archivo `decameron.conf` en la carpeta `sites-available` con el siguiente contenido:

   `<VirtualHost \*:80>`

   `ServerName decameron.test`

   `DocumentRoot /var/www/decameron/dist`

   `<Directory /var/www/decameron/dist>`

   `AllowOverride All`

   `</Directory>`

   `</VirtualHost>`

6. Habilita el sitio en tu servidor web.

7. Reinicia el servidor web para que los cambios se aplicen.

8. Crea la base de datos, en tu servidor o hosting.

9. Instala la base de datos con el comando `php artisan migrate:fresh --seed` desde el directorio del proyecto. Esto creara la base de datos y las tablas necesarias. (En caso de que no lo logren hacer por alli, les dejare un archivo .sql con las tablas listo para instalar.)

10. Accede a tu proyecto en `http://decameron.test`

## Desarrollo

El proyecto esta desarrollado con Laravel. Es una api para ser consumida desde React.

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
