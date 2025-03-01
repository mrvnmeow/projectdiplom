<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'deadline',
        'is_important',
        'priority',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Если вы добавили модель Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
