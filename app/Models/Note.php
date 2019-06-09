<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use App\Models\Tag;

class Note extends Model {

    protected $table = 'notes';
    
    protected $filable = ["id", "title", "slug"];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'note_tag', 'note_id', 'tag_id');
    }

}
