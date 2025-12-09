<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'name',
        'domain',
        'plan_type',
        'settings',
    ];

    protected $casts = [
        'settings' => 'array',
    ];
}
