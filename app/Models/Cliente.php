<?php

namespace App\Models;

use App\Models\Imagene;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'documento',
        'direccion',
        'telefono',
    ];


    public function images()
    {
        return $this->MorphOne(Imagene::class, 'model')->withDefault();
    }

    public function getImgAttribute()
    {

        if (!is_null($this->images->file)) {

            $img = $this->images->file;

            $exists = Storage::disk('public')->exists($img);



            if ($exists) {
                return asset('storage/' . $img);
            } else {
                return  asset('storage/noImg/noImg.png');
            }
        } else {



            return asset('storage/noImg/noImg.png');
        }
    }
}