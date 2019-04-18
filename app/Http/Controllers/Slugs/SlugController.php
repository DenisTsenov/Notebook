<?php

namespace App\Http\Controllers\Slugs;

use App\Http\Controllers\Controller;
use App\Models\Note;

class SlugController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    const STATUS_OK = 200;
    
    public function getIndex() {
        
        $allNotes = Note::orderBy('created_at', 'desc')->paginate(3);
        
        return view('slugs.index', ['allNotes' => $allNotes]);
    }
    
       /**
     * Display a listing of the resource using ajax request
     * 
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    function ajaxPagination(Request $request) {

        if ($request->ajax()) {

            $allNotes = DB::table('notes')->orderBy('created_at', 'desc')->paginate(3);

            return Response::json(['allNotes' => $allNotes], self::STATUS_OK);
        }
    }
    
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
