<?php

namespace App\Models;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['path'];

    public function announcement()
    {
        return $this->belongsTo(Announcement::class);
    }

    public function getUrlByFilePath($filePath , $w = null , $h = null){
        if(!$w && !$h){
            return Storage::url($filePath);
        }
        $path = dirname($filePath);
        $filename = basemane($filePath);
        $file = "{$path}/crop_{$w}x{$h}_{$filename}";

        return Store::url($file);
    }

    public function getUrl($w = null , $h = null){
        return Image::getUrlByFilePath($this->path, $w, $h);
    }
}
