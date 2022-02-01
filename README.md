<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

---

## Api Globasoft Wigilabs SAS

Environment:
- PHP 7.2.34
- MySQL 5.7.33

---

## Tasks Entity

| Domain                      | Method    | URI                 | Name          | Action                                      | Middleware |
|-----------------------------|-----------|---------------------|---------------|---------------------------------------------|------------|
|http://127.0.0.1:8000        | GET HEAD  | api/v1/tasks        | tasks.index   | App\Http\Controllers\TaskController@index   | api        |
|http://127.0.0.1:8000        | POST      | api/v1/tasks        | tasks.store   | App\Http\Controllers\TaskController@store   | api        |
|http://127.0.0.1:8000        | GET HEAD  | api/v1/tasks/{task} | tasks.show    | App\Http\Controllers\TaskController@show    | api        |
|http://127.0.0.1:8000        | PUT PATCH | api/v1/tasks/{task} | tasks.update  | App\Http\Controllers\TaskController@update  | api        |
|http://127.0.0.1:8000        | DELETE    | api/v1/tasks/{task} | tasks.destroy | App\Http\Controllers\TaskController@destroy | api        |
