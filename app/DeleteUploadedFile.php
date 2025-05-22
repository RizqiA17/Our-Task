<?php

namespace App;

trait DeleteUploadedFile
{
    public static function deleteUploadedFile($file_path): void
    {
        if ($file_path && file_exists(public_path($file_path))) {
            unlink(public_path($file_path));
        }
    }
}
