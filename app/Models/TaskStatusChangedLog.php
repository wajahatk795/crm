<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStatusChangedLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'user_id',
        'column',
        'old',
        'new'
    ];

    public function task ()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function user ()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
