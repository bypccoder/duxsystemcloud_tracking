<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadFile extends Model
{
    public static function Setfile($file, $ruta, $antiguo = false)
    {

        $imageName = $file->getClientOriginalName();
        $ex = $file->extension();
        /* dd( $ex); */
        $n = Str::slug($imageName) . '.' . $ex;
        if ($antiguo) {
            Storage::disk('public')->delete("$antiguo");
        }

        Storage::disk('public')->put($ruta . "/" . $n, \File::get($file));
        return $ruta . '/' . $n;
    }

    public static function deleteFile($file)
    {
        Storage::disk('public')->delete("$file");
    }

    public static function Setfilesinex($file, $ruta, $antiguo = false)
    {
        $imageName = $file->getClientOriginalName();
        //$ex = $file->extension();
        /* dd( $ex); */
        //$n = Str::slug($imageName) . '.' . $ex;
        if ($antiguo) {
            Storage::disk('public')->delete("$antiguo");
        }

        //Storage::disk('public')->put($ruta . "/" . $n, \File::get($file));
        Storage::disk('public')->put($ruta . "/" . $imageName, \File::get($file));
        return $ruta . '/' . $imageName;
    }
}
