<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Supplier;
use App\Models\Account;

class CxP extends Model
{
    use HasFactory;

    protected $table = "cxp";

    protected $fillable = [
        'id',
        'users_id',
        'suppliers_id',
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
    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'suppliers_id');
    }

    // relacion de muchos a uno.
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }
}
