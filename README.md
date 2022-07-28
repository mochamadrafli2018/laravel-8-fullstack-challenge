# Waste4Change Internship Technical Test Challenge #2 using PHP Framework

## Laravel Command

### Running

`php artisan serve`

### Create Model

`php artisan make:model model_name`

### Create Controller

`php artisan make:controller controller_name`

### Database Migration

1. Create migration file

`php artisan make:migration users_table`

2. Do migration

`php artisan migrate`

## Routes

### Web Routes

1. Index Page

`localhost:8080`

2. Items Page

`localhost:8080/items`

### Api Routes

1. GET All Data, CREATE All Data and DELETE All Data

- Materials REST API

`localhost:8000/api/materials`

- Types REST API

`localhost:8000/api/types`

2. GET Data By Id, PUT Data By Id and DELETE Data By Id

- Materials REST API

`localhost:8000/api/materials/{id}`

- Types REST API

`localhost:8000/api/types/{id}`

## Reference

1. Update Data

https://stackoverflow.com/questions/69804562/modelupdate-should-not-be-called-statically

## Error Documentation

Several solved error documentation :

1. SQLSTATE[01000]: Warning: 1265 Data truncated for column '...'

Solution : https://www.javatpoint.com/mysql-enum#:~:text=The%20ENUM%20data%20type%20in%20MySQL%20is%20a,may%20have%20one%20of%20the%20specified%20possible%20values.

2. Target Class does not exist

Solution : https://laravel.com/docs/8.x/releases

3. BadMethodCallException: Call to undefined method App\Models\User::table()

Solution : https://www.fundaofwebit.com/laravel-8/how-to-fetch-data-from-database-in-laravel

4. Error: Class &quot;App\Http\Controllers\api\Material&quot; not found

Solution : Name of table in MaterialController.php should match with name of table in MaterialModel.php

5. Error: Class &quot;App\Models\Models&quot; not found

Solution : Delete model file and make new model using `php artisan make:model model_name`

6. SQLSTATE[42S22]: Column not found: 1054 Unknown column 'updated_at' in 'field list'

Solution : https://stackoverflow.com/questions/28277955/laravel-unknown-column-updated-at

7. Call to a member function delete() on null

Solution : https://stackoverflow.com/questions/58480624/call-to-a-member-function-delete-on-null#:~:text=Call%20to%20a%20member%20function%20delete%20%28%29%20on,is%20%24id.%20so%20your%20%24post%20varaiable%20is%20null.