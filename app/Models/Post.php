<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['user_id','titulo','contents','fecha'];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

  
}

