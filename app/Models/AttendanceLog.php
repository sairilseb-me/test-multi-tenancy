<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceLog extends Model
{
    protected $fillable = [
        'tenant_id',
        'employee_id',
        'log_in',
        'log_out',
    ];

    protected $casts = [
        'log_in' => 'datetime',
        'log_out' => 'datetime',
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
