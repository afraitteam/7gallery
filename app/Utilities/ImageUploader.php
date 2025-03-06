<?php

namespace App\Utilities;

use File;
use Storage;

class ImageUploader
{

    public static function upload($image, $path, $diskType = 'public_stroage')
    {

        Storage::disk($diskType)->put($path, File::get($image));

    }

    public static function uploadMany(array $images, $path, $diskType = 'public_stroage')
    {


        $imagesPath = [];

        foreach ($images as $key => $image) {

            $fullPath = $path . 'products/' . $key . '/' . $image->getClientOriginalName();

            self::upload($image, $fullPath, $diskType);

            $imagesPath += [$key => $fullPath];
        }

        return $imagesPath;
    }
}