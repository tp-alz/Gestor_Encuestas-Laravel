### Gestor Encuestas + PHP + Laravel + Composer

Instalación dependencias:

```
composer install
```

Ejecutar migraciones (Base de datos 'encuesta' MySQL por defecto):

```
php artisan migrate:refresh
```

Llenar la base mediante Seeders:

```
php artisan db:seed
```

Para ejecutar localmente (por defecto puerto 8000):

```
php artisan serve
```

