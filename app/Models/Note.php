<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use App\Models\Tag;

class Note extends Model {

    protected $table = 'notes';

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'notes', 'note_id', 'tag_id');
    }

}
