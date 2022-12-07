<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'content', 'completed_at'];

    protected function completedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => !is_null($value) ? true : false,
        );
    }
}
