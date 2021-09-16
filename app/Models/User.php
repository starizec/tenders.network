<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'partner_id',
        'email',
        'password',
        'filter',
        'created_by',
        'updated_by',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getAllFilters($country_id = 1)
    {   
        $filters = [];
        $filters['types'] = Type::where('country_id', $country_id)->pluck('id')->toArray();
        $filters['categories'] = Category::where('country_id', $country_id)->pluck('id')->toArray();
        $filters['tags'] = Tag::where('country_id', $country_id)->pluck('id')->toArray();
        $filters['counties'] = County::where('country_id', $country_id)->pluck('id')->toArray();

        return base64_encode(serialize($filters));
    }
}
