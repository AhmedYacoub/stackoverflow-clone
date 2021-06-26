<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'user_id', 'best_answer_id', 'title', 'body',
        'views', 'answers', 'votes'
    ];

    /* Accessor & Mutator */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function getUrlAttribute()
    {
        return route('questions.show', $this);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute()
    {
        $status = 'unanswered';

        if ($this->answers > 0) {
            if ($this->best_answer_id)
                $status = 'answer-accepted';

            $status = 'answered';
        }

        return $status;
    }

    /* Relationships */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /* Custom Methods */
}
