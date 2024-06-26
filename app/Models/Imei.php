<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imei extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'imei',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

     // Define the relationship with the User model
     public function userImeis()
     {
         return $this->belongsTo(User::class, 'user_id')->withDefault([
             'name' => 'Guest',
         ]);
     }
}
