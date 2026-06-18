/** 
Documentación

API REST - Proyecto RDS

API REST desarrollada en Laravel para gestionar empleados, cargos y funciones de cargo. La API usa autenticacion con tokens Bearer mediante Laravel Sanctum, por lo tanto primero se debe registrar y iniciar sesion para obtener un token y despues consumir los endpoints protegidos.

Descripcion

Este proyecto permite realizar operaciones CRUD sobre:

Empleados, Cargos, Funciones cargo

Tambien incluye un endpoint especial para consultar el detalle completo de un empleado, incluyendo su nombre, cargo, salario y funciones asociadas al cargo.

Todas las rutas principales estan protegidas con Sanctum. Las unicas rutas publicas son:

POST /api/register
POST /api/login


Requisitos

Antes de instalar el proyecto, asegurate de tener instalado:

PHP 8.3 o superior
Composer
MySQL
Node.js y NPM
Git
Laravel compatible con la version del proyecto
Postman, Insomnia o curl para probar la API

El proyecto usa:

Laravel 13.8
Laravel Sanctum 4.0
PHP 8.3


Instalacion desde cero

1. Clonar el repositorio

Primero clona el repositorio en tu maquina:

git clone https://github.com/barrioshector/Proyecto_Api.git

Despues entra a la carpeta del proyecto:

cd Proyecto_Api


Copiar el archivo de entorno

Laravel usa un archivo .env para guardar la configuracion local del proyecto.

Copia el archivo de entorno de ejemplo ejecutando el siguiente comando:

cp .env.example .env

Si estas usando PowerShell en Windows, tambien puedes usar:

Copy-Item .env.example .env

Despues de copiarlo, el archivo generado se llamara:

.env

En ese archivo debes colocar tus credenciales, el nombre de la base de datos y la configuracion local del proyecto.


Generar la llave de la aplicacion

Ejecuta:

php artisan key:generate

Este comando genera el valor de APP_KEY dentro del archivo .env.
Configuracion de la base de datos

Abre el archivo .env y configura estas variables:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_api
DB_USERNAME=root
DB_PASSWORD=

Modifica los valores segun tu entorno:

DB_DATABASE: nombre de tu base de datos.
DB_USERNAME: usuario de MySQL.
DB_PASSWORD: contrasena del usuario de MySQL.

Si la base de datos no existe, creala primero antes de ejecutar las migraciones.

Ejemplo desde MySQL:

CREATE DATABASE laravel_api CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

Tambien puedes hacerlo desde consola:

mysql -u root -p

Luego ejecutas:

CREATE DATABASE laravel_api CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;

Una vez creada la base de datos y configurado el archivo .env, ejecuta las migraciones.


Ejecutar migraciones

php artisan migrate

Este comando crea las tablas necesarias en la base de datos.


Ejecutar seeders

php artisan db:seed

Este comando inserta datos iniciales, como cargos y funciones de cargo.

Si quieres reiniciar la base de datos desde cero y cargar los seeders, puedes usar:

php artisan migrate:fresh --seed


Ejecutar el proyecto

Levanta el servidor de Laravel:

php artisan serve

La API quedara disponible en:

http://127.0.0.1:8000

La URL base para consumir la API sera:

http://127.0.0.1:8000/api


Autenticacion

Para consumir los endpoints protegidos primero necesitas un token.

el token lo obtienes despues de iniciar seccion:
para iniciar seccion primero debes de estar registrado:

Guarda el token que devuelve la API, porque sera necesario para consultar, crear, actualizar y eliminar empleados, cargos y funciones cargo

Registrar usuario

Usa este endpoint si el usuario todavia no existe.

curl -X POST "http://127.0.0.1:8000/api/register" \
-H "Content-Type: application/json" \
-H "Accept: application/json" \
-d '{"name":"Hector","email":"hector@gmail.com","password":"123456"}'

Respuesta Exitosa
{
    "message": "Usuario Creado"
}

Iniciar sesion

Usa este endpoint si el usuario ya existe.

curl -X POST "http://127.0.0.1:8000/api/login" \
-H "Content-Type: application/json" \
-H "Accept: application/json" \
-d '{"email":"hector@gmail.com","password":"123456"}'

Respuesta Exitosa
{
    "token": "13|BqOjQ5kH3fzVGuT2Y1niC7FvjBD70IWCMKGbrFaJ841903be"
}

Respuesta Incorrecta
{
    "message": "Credenciales incorrectas"
}


Uso del token

Todas las rutas protegidas necesitan este header:

Authorization: Bearer TU_TOKEN_AQUI

Tambien se recomienda enviar:

Accept: application/json
Content-Type: application/json

Ejemplo:

curl http://127.0.0.1:8000/api/empleados \
  -H "Authorization: Bearer TU_TOKEN_AQUI" \
  -H "Accept: application/json"

Reemplaza TU_TOKEN_AQUI por el token recibido al iniciar sesion.


CREAR UN EMPLEADO  

curl -X POST "http://127.0.0.1:8000/api/empleados" \
-H "Authorization: Bearer 13|BqOjQ5kH3fzVGuT2Y1niC7FvjBD70IWCMKGbrFaJ841903be" \
-H "Content-Type: application/json" \
-H "Accept: application/json" \
-d '{
  "nombre":"Juan","apellido":"Perez","fecha_nacimiento":"2000-01-01","fecha_ingreso":"2025-01-01","salario":2500000,"estado":"activo","cargo_id":20
}'

Respuesta Exitosa 
{
    "message": "Empleado creado"
}

Respuesta Incorrceta
{
    "message": 'nombre.required' => 'El nombre es obligatorio',
        'apellido.required' => 'El apellido es obligatorio',
        'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria',
        'fecha_ingreso.required' => 'La fecha de ingreso es obligatoria',
        'salario.required' => 'El salario es obligatorio',
        'cargo_id.required' => 'El cargo es obligatorio',
        'cargo_id.exists' => 'El cargo seleccionado no existe',
}

MOSTRAR EMPLEADOS 

curl -X GET "http://127.0.0.1:8000/api/empleados" \
-H "Authorization: Bearer 13|BqOjQ5kH3fzVGuT2Y1niC7FvjBD70IWCMKGbrFaJ841903be" \
-H "Accept: application/json"

Respuesta Exitosa 
{
    "data":[{"id":1,"nombre":"Barrios","apellido":"Contreras","fecha_nacimiento":"1995-10-20","fecha_ingreso":"2024-01-15","salario":2500000,"estado":"inactivo","cargo_id":3,"created_at":"2026-06-05T06:05:51.000000Z","updated_at":"2026-06-14T16:37:59.000000Z"},{"id":4,"nombre":"Carlos","apellido":"Ramirez","fecha_nacimiento":"1995-04-20","fecha_ingreso":"2026-06-09","salario":2500000,"estado":"activo","cargo_id":1,"created_at":"2026-06-09T21:18:34.000000Z","updated_at":"2026-06-09T21:18:34.000000Z"}]
}


MOSTRAR EMPLEADOS POR ID
 
curl -X GET "http://127.0.0.1:8000/api/empleados/10" \
-H "Authorization: Bearer 13|BqOjQ5kH3fzVGuT2Y1niC7FvjBD70IWCMKGbrFaJ841903be" \
-H "Accept: application/json"

Respuesta Exitosa
{
    {"id":10,"nombre":"Barrios","apellido":"Contreras","fecha_nacimiento":"1995-10-20","fecha_ingreso":"2024-01-15","salario":2500000,"estado":"inactivo","cargo_id":3,"created_at":"2026-06-05T06:05:51.000000Z","updated_at":"2026-06-14T16:37:59.000000Z"}
}

Respuesta Incorrecta 
{
    "message": "Empleado no encontrado"
}


EDITAR UN EMPLEADO

curl -X PUT "http://127.0.0.1:8000/api/empleados/10" \
-H "Authorization: Bearer 13|BqOjQ5kH3fzVGuT2Y1niC7FvjBD70IWCMKGbrFaJ841903be" \
-H "Accept: application/json" \
-H "Content-Type: application/json" \
-d '{"nombre":"Barrios","apellido":"Contreras","fecha_nacimiento":"1995-10-20","fecha_ingreso":"2024-01-15","salario":2500000,"estado":"Inactivo","cargo_id":3}'

Respuesta Exitosa 
{
    {"message":"Empleado actualizado","data":{"id":10,"nombre":"Barrios","apellido":"Contreras","fecha_nacimiento":"1995-10-20","fecha_ingreso":"2024-01-15","salario":2500000,"estado":"Inactivo","cargo_id":3,"created_at":"2026-06-05T06:05:51.000000Z","updated_at":"2026-06-14T16:37:59.000000Z"}}
}

Respuesta Incorrecta 
{
    "message": "Empleado no encontrado"
}

ELIMINAR UN EMPLEADO 
 

curl -X DELETE "http://127.0.0.1:8000/api/empleados/6" \
-H "Authorization: Bearer 13|BqOjQ5kH3fzVGuT2Y1niC7FvjBD70IWCMKGbrFaJ841903be" \
-H "Accept: application/json"

Respuesta Exitosa 
{
   "message": "Empleado eliminado" 
}

Respuesta Incorrecta 
{
   "message": "Empleado no encontrado" 
}


CRAER UN CARGO 

curl -X POST http://127.0.0.1:8000/api/cargos \
-H "Authorization: Bearer 16|w6TYFcd8e22DP32xLFqnGU6pC7CsJd2vgs3v8vCef89f4bcf" \
-H "Accept: application/json" \
-H "Content-Type: application/json" \
-d '{
    "nombre_cargo":"Desarrollador Backend",
    "descripcion":"Encargado del desarrollo de APIs"
}'

Respuesta exitosa

{
    "message":"Cargo creado correctamente","data":{"nombre_cargo":"Desarrollador Backend","descripcion":"Encargado del desarrollo de APIs","updated_at":"2026-06-18T14:05:59.000000Z","created_at":"2026-06-18T14:05:59.000000Z","id":41}
}


MOSTRAR CARGOS 

curl -X GET http://127.0.0.1:8000/api/cargos \
-H "Authorization: Bearer 16|w6TYFcd8e22DP32xLFqnGU6pC7CsJd2vgs3v8vCef89f4bcf" \
-H "Accept: application/json"


MOSTRAR CARGOS POR ID 

curl -X GET http://127.0.0.1:8000/api/cargos/41 \
-H "Authorization: Bearer 16|w6TYFcd8e22DP32xLFqnGU6pC7CsJd2vgs3v8vCef89f4bcf" \
-H "Accept: application/json"

Respuesta Exitosa

{
    "id":41,"nombre_cargo":"Desarrollador Backend","descripcion":"Encargado del desarrollo de APIs","created_at":"2026-06-18T14:05:59.000000Z","updated_at":"2026-06-18T14:05:59.000000Z"
}

Respuesta Incorrecta 

{
    "message": "Cargo no encontrdao"
}


EDITAR UN CARGO 

curl -X PUT http://127.0.0.1:8000/api/cargos/41 \
-H "Authorization: Bearer 16|w6TYFcd8e22DP32xLFqnGU6pC7CsJd2vgs3v8vCef89f4bcf" \
-H "Accept: application/json" \
-H "Content-Type: application/json" \
-d '{
    "nombre_cargo":"Senior Backend",
    "descripcion":"Desarrollador Backend Senior"
}'


Respuesta Exitosa 

{
    "message":"Cargo actualizado","data":{"id":41,"nombre_cargo":"Senior Backend","descripcion":"Desarrollador Backend Senior","created_at":"2026-06-18T14:05:59.000000Z","updated_at":"2026-06-18T14:28:22.000000Z"}
}

Respuesta Incorrecta 

{
    "message": "Cargo no encontrado"
}


ELIMINAR UN CARGO 

curl -X DELETE http://127.0.0.1:8000/api/cargos/41 \
-H "Authorization: Bearer 16|w6TYFcd8e22DP32xLFqnGU6pC7CsJd2vgs3v8vCef89f4bcf" \
-H "Accept: application/json"


Respuesta Exitosa 

{
    "message":"Cargo eliminado"
}

Respuesta Incorrecta

{
    "message": "Cargo no encontrado"
}




