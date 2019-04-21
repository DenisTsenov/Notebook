<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Note;
class Category extends Model
{
    protected $table = 'categories';

    public function notes() {
        return $this->hasMany(Note::class, 'category_id', 'id');
    }
    
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
