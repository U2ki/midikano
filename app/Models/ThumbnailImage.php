<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThumbnailImage extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function posts() {
        return $this->belongsTo( 'App\Post' );
    }
}
