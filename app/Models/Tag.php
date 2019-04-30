<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Note;

class Tag extends Model {

    protected $table = 'tags';

    public function notes() {
        return $this->belongsToMany(Note::class, 'tags', 'tag_id', 'note_id');
    }

}
