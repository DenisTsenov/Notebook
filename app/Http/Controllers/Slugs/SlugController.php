<?php

namespace App\Http\Controllers\Slugs;

use App\Http\Controllers\Controller;
use App\Models\Note;

class SlugController extends Controller {

    /**
     * Return Note find by it's slug
     * 
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function getNoteBySlug(string $slug) {
        
        $noteBySlug = Note::where('slug', $slug)->first();
        
        return view('slugs.single', ['noteBySlug' => $noteBySlug]);
        
    }

}
