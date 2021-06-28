<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HideTweet extends Model
{
    protected $fillable = ['tweet_id','user_id'];
    use HasFactory;
    public function usertweet()
    {
        return $this->belongsTo(User::class);
    }
}
