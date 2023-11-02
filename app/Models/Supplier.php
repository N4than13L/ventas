<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Supplier extends Model
{
    use HasFactory;
    protected $table = "suppliers";

    protected $fillable = [
        'id',
        'name',
        'address',
        'users_id',
        'created_at',
        'updated_at'
    ];



    // relacion de muchos a uno.
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
