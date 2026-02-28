<?php

namespace App\Support;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\UploadedFile as FileUploadedFile;

class ImageService
{
    public function upload(array $data, string $fieldName, string $folder): ?string
    {
        if (isset($data[$fieldName]) && $data[$fieldName] instanceof \Illuminate\Http\UploadedFile) {




            $filename = Str::uuid() . "." . $data[$fieldName]->extension();

            $path = $data[$fieldName]->storeAs($folder . '/' . date("Y/m/d"), $filename, "public");
            return $path;
        }
        return null;
    }



    public function update(Model $request, array $data, string $fieldName, string $folder): ?string
    {

        if ($data[$fieldName] && $data[$fieldName] instanceof FileUploadedFile) {

            $filename = Str::uuid() . "." . $data[$fieldName]->extension();
            $path = $data[$fieldName]->storeAs(
                $folder . "/" . date("Y/m/d"),
                $filename,
                "public"
            );
            $oldImage = $request->{$fieldName};
            if ($oldImage) {
                Storage::disk("public")->delete($oldImage);
            }
            return $path;
        }
        return null;
    }
}
