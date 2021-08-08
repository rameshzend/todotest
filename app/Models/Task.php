<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'body',
        'due_date',
        'attachment',
        'reminders',
        'reminder_date',
        'status'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
