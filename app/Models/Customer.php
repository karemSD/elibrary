<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = [];

    public function copybooks()
    {

        return $this->hasMany(CopyBook::class);
    }
    public function carts()
    {
        return $this->hasMany(CopyBook::class);
    }
}
