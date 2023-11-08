<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Client;
use App\Models\Product;
use App\Models\Account;

class Bill extends Model
{
    use HasFactory;

    protected $table = "bills";

    protected $fillable = [
        'id',
        'attendedby',
        'volume',
        'users_id',
        'clients_id',
        'created_at',
        'updated_at'
    ];

    // relacion de muchos a uno.
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    // relacion de muchos a uno.
    public function clients()
    {
        return $this->belongsTo(Client::class, 'clients_id');
    }

    // relacion de muchos a uno.
    public function products()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }
}
