/** 
Documentación API RDS

API REST desarrollada con Laravel 13 y Laravel Sanctum para la gestión de empleados.

Características:

Registro de usuarios.
Inicio de sesión.
Autenticación mediante Tokens de Sanctum.
Gestión de empleados protegida por autenticación.

primero en la terminal de Windows PowerShell

entramos al Proyecto 

cd "C:\Users\barri\Documents\ProyectoLaravelApi\rds-api"

dentro del proyecto corremos el servidor 

php artisan serve 

Despues nos vamos a Git bash para hacer las peticiones pero primero debemos entrar al proyecto 

$ cd /c/Users/barri/Documents/ProyectoLaravelApi/rds-api

REGISTRAR UN USUARIO 

EJEMPLO CURL 

curl -X POST "http://127.0.0.1:8000/api/register" \
-H "Content-Type: application/json" \
-H "Accept: application/json" \
-d "{"name":"Hector","email":"hector@gmail.com","password":"12345678"}"

Respuesta Exitosa
{
    "message": "Usuario Creado"
}


INICIAR SECCION

Autenticación

La API utiliza Laravel Sanctum.

Después de iniciar sesión, el usuario recibe un token.

Ese token debe enviarse en cada petición protegida:

EJEMPLO CURL INICIAR SECCION 

curl -X POST "http://127.0.0.1:8000/api/login" \
-H "Content-Type: application/json" \
-H "Accept: application/json" \
-d '{"email":"hector@gmail.com","password":"12345678"}'

Respuesta Exitosa
{
    "token": "1|abcdef123456..."
}

Respuesta Incorrecta
{
    "message": "Credenciales incorrectas"
}

Endpoints Protegidos

CREAR UN EMPLEADO 

EJEMPLO CURL 

curl -X POST "http://127.0.0.1:8000/api/empleados" \
-H "Authorization: Bearer 13|BqOjQ5kH3fzVGuT2Y1niC7FvjBD70IWCMKGbrFaJ841903be" \
-H "Content-Type: application/json" \
-H "Accept: application/json" \
-d '{
  "nombre":"Juan","apellido":"Perez","fecha_nacimiento":"2000-01-01","fecha_ingreso":"2025-01-01","salario":2500000,"estado":"activo","cargo_id":1
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

EJEMPLO CURL 
  curl -X GET "http://127.0.0.1:8000/api/empleados" \
-H "Authorization: Bearer 13|BqOjQ5kH3fzVGuT2Y1niC7FvjBD70IWCMKGbrFaJ841903be" \
-H "Accept: application/json"

Respuesta Exitosa 
{
    "data":[{"id":1,"nombre":"Barrios","apellido":"Contreras","fecha_nacimiento":"1995-10-20","fecha_ingreso":"2024-01-15","salario":2500000,"estado":"inactivo","cargo_id":3,"created_at":"2026-06-05T06:05:51.000000Z","updated_at":"2026-06-14T16:37:59.000000Z"},{"id":4,"nombre":"Carlos","apellido":"Ramirez","fecha_nacimiento":"1995-04-20","fecha_ingreso":"2026-06-09","salario":2500000,"estado":"activo","cargo_id":1,"created_at":"2026-06-09T21:18:34.000000Z","updated_at":"2026-06-09T21:18:34.000000Z"}]
}

MOSTRAR EMPLEADOS POR ID

EJEMPLO CURL 

curl -X GET "http://127.0.0.1:8000/api/empleados/1" \
-H "Authorization: Bearer 13|BqOjQ5kH3fzVGuT2Y1niC7FvjBD70IWCMKGbrFaJ841903be" \
-H "Accept: application/json"

Respuesta Exitosa
{
    {"id":1,"nombre":"Barrios","apellido":"Contreras","fecha_nacimiento":"1995-10-20","fecha_ingreso":"2024-01-15","salario":2500000,"estado":"inactivo","cargo_id":3,"created_at":"2026-06-05T06:05:51.000000Z","updated_at":"2026-06-14T16:37:59.000000Z"}
}

Respuesta Incorrecta 
{
    "message": "Empleado no encontrado"
}


EDITAR UN EMPLEADO

EJEMPLO CURL

curl -X PUT "http://127.0.0.1:8000/api/empleados/1" \
-H "Authorization: Bearer 13|BqOjQ5kH3fzVGuT2Y1niC7FvjBD70IWCMKGbrFaJ841903be" \
-H "Accept: application/json" \
-H "Content-Type: application/json" \
-d '{"nombre":"Barrios","apellido":"Contreras","fecha_nacimiento":"1995-10-20","fecha_ingreso":"2024-01-15","salario":2500000,"estado":"Inactivo","cargo_id":3}'

Respuesta Exitosa 
{
    {"message":"Empleado actualizado","data":{"id":1,"nombre":"Barrios","apellido":"Contreras","fecha_nacimiento":"1995-10-20","fecha_ingreso":"2024-01-15","salario":2500000,"estado":"Inactivo","cargo_id":3,"created_at":"2026-06-05T06:05:51.000000Z","updated_at":"2026-06-14T16:37:59.000000Z"}}
}

Respuesta Incorrecta 
{
    "message": "Empleado no encontrado"
}


ELIMINAR UN EMPLEADO 

EJEMPLO CURL 

curl -X DELETE "http://127.0.0.1:8000/api/empleados/1" \
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
 */

























