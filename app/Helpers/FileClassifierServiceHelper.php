<?php
namespace App\Helpers;
use Illuminate\Http\UploadedFile;

trait FileClassifierServiceHelper {
    public function classifier($data) {
        $images = [];
        $files = [];

        foreach ($data as $field => $value) {

            if ($value instanceof UploadedFile) {

                if (str_starts_with($value->getMimeType(), 'image/')) {
                    $images[$field] = $value;
                } else {
                    $files[$field] = $value;
                }

            }
        }

        
        return [
            "images" => $images,
            'files' => $files
        ];
    }

 
}