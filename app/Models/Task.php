<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'description',
        'due_date',
        'status',
        'completed_at',
    ];
    protected $casts = [
        'due_date' => 'datetime',     
        'completed_at' => 'datetime',   
    ];

 
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
