##### `Employee report`

###### Requirements

- ``PHP ^7.0``
- ``MySQL server``

###### Configuration

- ``copy .env.example to .env file and configurate with proper setup``

###### Build instructions

- ``composer install``
- ``php artisan migrate:install``
- ``php artisan migrate``
- ``php artisan db:seed``
- ``php artisan serve``

###### Examples

- ``http://127.0.0.1:8000/api/employee?sortBy=salary_total&sortOrder=desc``
- ``http://127.0.0.1:8000/api/employee?first_name=John``
- ``http://127.0.0.1:8000/api/employee?surname=Smith``
- ``http://127.0.0.1:8000/api/employee?department=1``
- ``http://127.0.0.1:8000/api/employee?sortBy=salary_total&sortOrder=asc&first_name=John``
