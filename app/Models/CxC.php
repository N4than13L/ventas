<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Account;
use App\Models\Client;

class CxC extends Model
{
    use HasFactory;

    protected $table = "cxc";

    protected $fillable = [
        'id',
        'users_id',
        'clients_id',
        'account_id',
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
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }
}
