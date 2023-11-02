<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Account;
use App\Models\Product;

class Client extends Model
{
    use HasFactory;

    protected $table = "clients";

    protected $fillable = [
        'id',
        'fullname',
        'address',
        'email',
        'phone',
        'nick',
        'users_id',
        'account_id',
        'products_id',
        'created_at',
        'updated_at'
    ];


    // relacion de muchos a uno.
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    // relacion de muchos a uno.
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    // relacion de muchos a uno.
    public function products()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }
}
