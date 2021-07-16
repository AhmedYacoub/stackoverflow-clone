<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'user_id', 'question_id', 'body', 'votes_count',
    ];

    public static function boot()
    {
        parent::boot();

        static::saved(function ($answer) {
            $answer->question->increment('answers_count');
        });
    }

    /** Accessors and Mutators */
    public function getHtmlBodyAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }

    /** Relations */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }

    /** Custom Methods */


}
