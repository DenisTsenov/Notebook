<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;

class Note extends Model
{
    protected $table = 'notes';


    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
