<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{


    public function posts() {
       // post_tag is the name of an intermediary table for many to many relationship
        // its naming convention is in alphabetical order
        return $this->belongsToMany('App\Post', 'post_tag', 'tag_id', 'post_id');
    }
}
