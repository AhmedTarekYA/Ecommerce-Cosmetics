<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait  UploadFiles
{
    function saveFile($file, $folder, $compress = 'yes', $quality_ratio = 70): string
    {

        // to save photos
        if ($compress == 'yes' || $compress == null) {
            $image = Image::make($file);
            $file_name = $folder . '/' . rand('1', '9999') . time() . '.webp';
            $image->save($file_name, $quality_ratio, 'webp');
        } // to save other files
        else {
            $file_extension = $file->getClientOriginalExtension();
            $file_name = $folder . '/' . rand('1', '9999') . time() . '.' . $file_extension;
            $file->move($folder, $file_name);
        }
        return $file_name;
    }
}
