<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'user_id',
        'category_id',
        'title',
        'content',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }


    public function isOwnedBy(User $user): bool
    {
        return $this->user_id === $user->id;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($question) {
            if (empty($question->slug)) {
                $question->slug = Str::slug($question->title);
            }
        });

        static::updating(function ($question) {
            if ($question->isDirty('title')) {
                $question->slug = Str::slug($question->title);
            }
        });
    }
}
