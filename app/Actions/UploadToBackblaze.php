<?php

namespace App\Actions;

use Aws\S3\S3Client;
use Aws\Credentials\Credentials;


class UploadToBackblaze
{
    private S3Client $client;

    public function __construct()
    {
        $applicationKeyId = env('BACKBLAZE_KEY_ID');
        $applicationKey = env('BACKBLAZE_APP_KEY');
        $region = env('BACKBLAZE_REGION'); // Replace with your B2 region code

        $credentials = new Credentials($applicationKeyId, $applicationKey);

        // Instantiate the S3 client using your B2profile
        // Replace 'your_access_key', 'your_secret_key', and 'your_region' with your Backblaze B2 credentials
        $this->client = new S3Client([
            'version' => 'latest',
            'region' => $region,
            'endpoint' => 'https://s3.' . $region . '.backblazeb2.com',
            'credentials' => $credentials,
        ]);
    }

    public function createBucketForCourse(string $courseName)
    {
        $courseName = str($courseName)->lower()->replace(' ','')->trim()->toString();

        return $this->client->createBucket([
            'Bucket' => $courseName,
        ]);
    }

    public function upload()
    {
        
    }
}
