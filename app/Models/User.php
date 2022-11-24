<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Imagene;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user',
        'type_user',
        'password_view',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
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
