<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostGood extends Model {
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'post_id','user_id','like'
    ];

    public function users() {
        return $this->belongsTo( 'App\User' );
    }

    public function posts() {
        return $this->belongsTo( 'App\Post' );
    }
}
