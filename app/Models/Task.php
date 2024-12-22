<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'completed' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
