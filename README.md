<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

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

curl -X POST http://127.0.0.1:8000/api/register 
-H "Content-Type: application/json" 
-H "Accept: application/json" 
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

curl -X POST http://127.0.0.1:8000/api/login 
-H "Content-Type: application/json" 
-H "Accept: application/json" 
-d "{"email":"hector@gmail.com","password":"12345678"}"

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

curl -X POST http://127.0.0.1:8000/api/empleados 
-H "Authorization: Bearer 1|abcdef123456... 
-H "Content-Type: application/json" 
-H "Accept: application/json" 
-d "{
  "nombre":"Juan","apellido":"Perez","fecha_nacimiento":"2000-01-01","fecha_ingreso":"2025-01-01","salario":2500000,"estado":"activo","cargo_id":1
}"

 */

























