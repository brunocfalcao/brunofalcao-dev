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

use Eduka\Cube\Models\Video;
use Eduka\Nova\Actions\VimeoHandler;
use Illuminate\Support\Arr;

Route::get('y', function(){

    $video = Video::first();

    $courses = [];

    $video->chapters->each(function($chapter) use(&$courses) {
        $courses[] = $chapter->course_id;
    });

    dd($courses, array_unique($courses));

    dd($video->chapters->unique('course_id'));

    $x = (new VimeoHandler)->ensureProjectExists($video->course);
    dd($x);
    // $p = "/users/210982378/projects/18512233";
    // dd(str($p)->afterLast('/')->toString());
    return 'y;';
});
