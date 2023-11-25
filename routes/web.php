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

use Eduka\Cube\Models\Course;
use Eduka\Cube\Models\Video;
use Eduka\Nova\Services\Vimeo\VimeoClient;

Route::get('/x', function() {
    // $course = Course::first();
    // $video = Video::find('11');

    // return $video->course;
    // return $course->courseVideos;

    // $vimeo = new VimeoClient;

    // $response = $vimeo->getPlaylists(); // You can adjust 'per_page' as needed


    $video = Video::select('id', 'name', 'meta_description', 'vimeo_id','chapter_id')
    ->with([
        'videoStorage',
        'variant' => function($variant) {
            $variant
            ->select('chapter_variant.variant_id','chapter_variant.chapter_id','variants.course_id','variants.vimeo_project_id')
            ->with(['course' => function($course) { $course->select('id','name'); }]);
        }
    ])
    ->where('id', 1)
    ->first();

    // $response = Video::find(1);

    return ($video);
});
