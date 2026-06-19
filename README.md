# 📚 Documentación API REST - Proyecto RDS

API REST desarrollada en **Laravel** para gestionar **empleados**, **cargos** y **funciones de cargo**.

La API utiliza autenticación mediante **Laravel Sanctum** con tokens Bearer. Por lo tanto, primero debes registrar un usuario e iniciar sesión para obtener un token y luego consumir los endpoints protegidos.

---

## 📌 Descripción

Este proyecto permite realizar operaciones CRUD sobre:

- Empleados
- Cargos
- Funciones de cargo

Además, incluye un endpoint especial para consultar el detalle completo de un empleado, incluyendo:

- Nombre
- Cargo
- Salario
- Funciones asociadas al cargo

Todas las rutas principales están protegidas con **Laravel Sanctum**.

Las únicas rutas públicas son:

- `POST /api/register`
- `POST /api/login`

---

## ⚙️ Requisitos

Antes de instalar el proyecto, asegúrate de tener instalado:

- PHP 8.3 o superior
- Composer
- MySQL
- Node.js y NPM
- Git
- Postman, Insomnia o curl

### Tecnologías utilizadas

- Laravel 13.8
- Laravel Sanctum 4.0
- PHP 8.3

---

# 🚀 Instalación desde cero

## 1. Clonar el repositorio

```bash
git clone https://github.com/barrioshector/Proyecto_Api.git
```

Entrar a la carpeta:

```bash
cd Proyecto_Api
```

---

## 2. Instalar dependencias

```bash
composer install
```

Si usas frontend:

```bash
npm install
```

---

## 3. Copiar el archivo de entorno

Linux o Git Bash:

```bash
cp .env.example .env
```

PowerShell:

```powershell
Copy-Item .env.example .env
```

---

## 4. Generar la llave de la aplicación

```bash
php artisan key:generate
```

---

## 5. Configurar la base de datos

En el archivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_api
DB_USERNAME=root
DB_PASSWORD=
```

---

## 6. Ejecutar migraciones

```bash
php artisan migrate
```

---

## 7. Ejecutar seeders

```bash
php artisan db:seed
```

O reiniciar la base de datos:

```bash
php artisan migrate:fresh --seed
```

---

## 8. Ejecutar el proyecto

```bash
php artisan serve
```

La API estará disponible en:

```text
http://127.0.0.1:8000
```

URL base:

```text
http://127.0.0.1:8000/api
```

---

# 🔐 Autenticación

Para consumir los endpoints protegidos primero debes obtener un token.

## Registrar usuario

**POST** `/api/register`

```bash
curl -X POST "http://127.0.0.1:8000/api/register" \
-H "Content-Type: application/json" \
-H "Accept: application/json" \
-d '{"name":"Hector","email":"hector@gmail.com","password":"12345678"}'
```

### Respuesta exitosa

```json
{
  "message": "Usuario Creado"
}
```

---

## Iniciar sesión

**POST** `/api/login`

```bash
curl -X POST "http://127.0.0.1:8000/api/login" \
-H "Content-Type: application/json" \
-H "Accept: application/json" \
-d '{"email":"hector@gmail.com","password":"12345678"}'
```

### Respuesta exitosa

```json
{
  "token": "13|BqOjQ5kH3fzVGuT2Y1niC7FvjBD70IWCMKGbrFaJ841903be"
}
```

### Respuesta incorrecta

```json
{
  "message": "Credenciales incorrectas"
}
```

---

## Uso del Token

Todas las rutas protegidas requieren:

```text
Authorization: Bearer TU_TOKEN_AQUI
```

También:

```text
Accept: application/json
Content-Type: application/json
```

Ejemplo:

```bash
curl "http://127.0.0.1:8000/api/empleados" \
-H "Authorization: Bearer TU_TOKEN_AQUI" \
-H "Accept: application/json"
```

---

# 👨‍💼 Endpoints de Empleados

## Crear empleado

**POST** `/api/empleados`

```bash
curl -X POST "http://127.0.0.1:8000/api/empleados" \
-H "Authorization: Bearer TU_TOKEN_AQUI" \
-H "Content-Type: application/json" \
-H "Accept: application/json" \
-d '{
"nombre":"Juan",
"apellido":"Perez",
"fecha_nacimiento":"2000-01-01",
"fecha_ingreso":"2025-01-01",
"salario":2500000,
"estado":"activo",
"cargo_id":20
}'
```

### Respuesta exitosa

```json
{
  "message": "Empleado creado"
}
```

---

## Mostrar empleados

**GET** `/api/empleados?page=1, 2, 3`

```bash
curl -X GET "http://127.0.0.1:8000/api/empleados?page=1" \
-H "Authorization: Bearer TU_TOKEN_AQUI" \
-H "Accept: application/json"
```

---

## Mostrar empleado por ID

**GET** `/api/empleados/{id}`

```bash
curl -X GET "http://127.0.0.1:8000/api/empleados/10" \
-H "Authorization: Bearer TU_TOKEN_AQUI" \
-H "Accept: application/json"
```

---

## Editar empleado

**PUT** `/api/empleados/{id}`

```bash
curl -X PUT "http://127.0.0.1:8000/api/empleados/10" \
-H "Authorization: Bearer TU_TOKEN_AQUI" \
-H "Accept: application/json" \
-H "Content-Type: application/json" \
-d '{
"nombre":"Juan",
"apellido":"Perez",
"fecha_nacimiento":"2000-01-01",
"fecha_ingreso":"2025-01-01",
"salario":2500000,
"estado":"activo",
"cargo_id":20
}'
```

---

## Eliminar empleado

**DELETE** `/api/empleados/{id}`

```bash
curl -X DELETE "http://127.0.0.1:8000/api/empleados/10" \
-H "Authorization: Bearer TU_TOKEN_AQUI" \
-H "Accept: application/json"
```

---

# 💼 Endpoints de Cargos

## Crear cargo

**POST** `/api/cargos`

```bash
curl -X POST "http://127.0.0.1:8000/api/cargos" \
-H "Authorization: Bearer TU_TOKEN_AQUI" \
-H "Accept: application/json" \
-H "Content-Type: application/json" \
-d '{
"nombre_cargo":"Desarrollador Backend",
"descripcion":"Encargado del desarrollo de APIs"
}'
```

---

## Mostrar cargos

**GET** `/api/cargos`

```bash
curl -X GET "http://127.0.0.1:8000/api/cargos" \
-H "Authorization: Bearer TU_TOKEN_AQUI" \
-H "Accept: application/json"

---

## Mostrar cargo por ID

**GET** `/api/cargos/{id}`

---
curl -X GET "http://127.0.0.1:8000/api/cargos/41" \
-H "Authorization: Bearer TU_TOKEN_AQUI" \
-H "Accept: application/json"

## Editar cargo

**PUT** `/api/cargos/{id}`

---
curl -X PUT "http://127.0.0.1:8000/api/cargos/41" \
-H "Authorization: Bearer TU_TOKEN_AQUI" \
-H "Accept: application/json" \
-H "Content-Type: application/json" \
-d '{ 
"nombre_cargo":"Senior Backend", "descripcion":"Desarrollador Backend Senior" 
}'
## Eliminar cargo

**DELETE** `/api/cargos/{id}`

---
curl -X DELETE "http://127.0.0.1:8000/api/cargos/41" \
-H "Authorization: Bearer TU_TOKEN_AQUI" \
-H "Accept: application/json"

# 🛠️ Endpoints de Funciones de Cargo

## Crear función de cargo

**POST** `/api/funcionescargos`

```bash
curl -X POST "http://127.0.0.1:8000/api/funcionescargos" \
-H "Authorization: Bearer TU_TOKEN_AQUI" \
-H "Accept: application/json" \
-H "Content-Type: application/json" \
-d '{
"descripcion_funcion":"Desarrollar APIs REST",
"estado":"activo",
"cargo_id":40
}'

## Mostrar funciones de cargo

**GET** `/api/funcionescargos`

---
curl -X GET "http://127.0.0.1:8000/api/funcionescargos" \
-H "Authorization: Bearer TU_TOKEN_AQUI" \
-H "Accept: application/json"

## Mostrar función de cargo por ID

**GET** `/api/funcionescargos/{id}`
---
curl -X GET "http://127.0.0.1:8000/api/funcionescargos/201" \
-H "Authorization: Bearer TU_TOKEN_AQUI" \
-H "Accept: application/json"


## Eliminar función de cargo

**DELETE** `/api/funcionescargos/{id}`
---
curl -X DELETE "http://127.0.0.1:8000/api/funcionescargos/201" \
-H "Authorization: Bearer TU_TOKEN_AQUI" \
-H "Accept: application/json"
# 🧪 Pruebas

Las pruebas de los endpoints pueden realizarse mediante:

- Insomnia
- curl

---

# 👨‍💻 Autor

**Héctor Barrios**

Proyecto desarrollado con Laravel y Laravel Sanctum para la gestión de empleados, cargos y funciones de cargo.