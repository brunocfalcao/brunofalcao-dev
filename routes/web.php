<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Nothing to default here, unless something specific you want to test.
| The Eduka route files are loaded dynamically by the framework.
|
*/

Route::get('/x',function (){
    return config('mail');
});