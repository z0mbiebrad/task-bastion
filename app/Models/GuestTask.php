<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestTask extends Model
{
    protected $guarded = [];

    protected $casts = [
        'completed' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'custom_task_days' => 'array', // Automatically decode JSON to an array
    ];
}
