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
use Aws\S3\S3Client;
use Aws\Credentials\Credentials;


Route::get('/p', function () {
    $applicationKeyId = env('BACKBLAZE_KEY_ID');
    $applicationKey = env('BACKBLAZE_APP_KEY');
    $bucketName = 'hello01';
    $region = 'us-east-005'; // Replace with your B2 region code

    $credentials = new Credentials($applicationKeyId, $applicationKey);

    // Instantiate the S3 client using your B2profile
    // Replace 'your_access_key', 'your_secret_key', and 'your_region' with your Backblaze B2 credentials
    $client = new S3Client([
        'version' => 'latest',
        'region' => $region,
        'endpoint' => 'https://s3.'.$region.'.backblazeb2.com',
        'credentials' => $credentials,
    ]);

    // Create the bucket
    return $client->createBucket([
        'Bucket' => $bucketName,
    ]);
});

Route::get('y', function () {

    $video = Video::first();

    $courses = [];

    $video->chapters->each(function ($chapter) use (&$courses) {
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
