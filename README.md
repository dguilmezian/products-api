#Products API

###Requisitos
- php7.3
- mysql

###Pasos de instalación:
1. Clonar el repositorio
2. Crear schema en la base de datos
3. Configurar nuestro .env a partir del .env.example
    1. En DB_DATABASE= poner el nombre del schema creado
    2. En DB_USERNAME= poner nuestro usuario de mysql (por defecto es root)
    3. En DB_PASSWORD= poner nuestra clave de usuario de mysql (por defecto no tiene)
4. Ejecutar el comando 'composer install'
5. Ejecutar el comando 'php artisan key:generate'
6. Ejecutar: php artisan migrate
7. Ejecutar: php artisan db:seed --class=BrandsSeeder
8. Ejecutar: php artisan db:seed --class=CategoriesSeeder
9. Ejecutar: php artisan db:seed --class=ProductsSeeder
10. Ejecutar el comando 'php artisan serve'
11. La API se estará ejecutando en http://localhost:8000 

###Aclaraciones
1. Se proporciona documentacion de la API en el products-api.yaml . Se puede visualizar utilizando https://editor.swagger.io/
2. Se separaron las marcas y las categorias en clases y tablas distintas en la base de datos.
3. Si se envia un string con una categoría que no se encuentra, se creara la misma. 
