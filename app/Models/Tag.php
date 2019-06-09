<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Note;

class Tag extends Model {

    protected $table = 'tags';

    public function notes() {
        return $this->belongsToMany(Note::class, 'note_tag', 'tag_id', 'note_id');
    }

}
