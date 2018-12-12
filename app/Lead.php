<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $casts = [
        'product' => 'string',
        'strain' => 'string',
        'name' => 'string',
        'email' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $fillable = [
        'product',
        'strain',
        'name',
        'email',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
