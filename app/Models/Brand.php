<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';
    protected $fillable = ['name', 'url', 'status', 'logo', 'auth_key', 'phone', 'phone_tel', 'email', 'address', 'address_link', 'sign'];

    public function user()
    {
        return $this->belongsTo(User::class, 'brand_id');
    }

    public function services(){
        return $this->hasMany(Service::class);
    }

}
