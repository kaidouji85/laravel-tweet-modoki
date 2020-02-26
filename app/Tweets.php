<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * tweetsテーブルのORマッパ
 * 
 * @author Y.Takeuchi
 */
class Tweets extends Model
{
    protected $fillable = [
        'content', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getContentAttribute($value)
    {
        return decrypt($value);
    }

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = encrypt($value);
    }
}
