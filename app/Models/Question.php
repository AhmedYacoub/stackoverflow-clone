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

    /* Relationships */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /* Custom Methods */
}
