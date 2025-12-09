<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Scopes\TenantScope;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'tenant_id',
        'first_name',
        'last_name',
        'birthdate',
        'department_id',
    ];

    protected $casts = [
        'birthdate' => 'date',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new Scopes\TenantScope);
    }


    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}