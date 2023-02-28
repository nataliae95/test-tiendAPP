# **Test de conocimiento para TiendAPP**

## Pasos para la instalación del repositorio y ambiente de desarrollo 

### Requisitos

Por favor previamente debe tener instalado en su maquina.

- git
- laravel

### Instalación

- Clone el repositorio `git clone https://github.com/nataliae95/test-tiendapp.git`
- Copie el archivo con las variables de entorno `cp .env.example .env`
- *De ser necesario edite el archivo `.env` y personalice los puerto de la DB*
- Instale los paquetes necesarios `composer install` y `npm install`
- Corra las migraciones y seeders `php artisan migrate:fresh --seed`

### Ejecución de procesos

Si usted desea ingresar y ejecutar procesos 

- Laravel `php artisan serve`


