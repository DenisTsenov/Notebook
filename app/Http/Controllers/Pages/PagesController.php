<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Note;

/**
 * This controller manage for all static pages
 *
 * @author denis
 */
class PagesController extends Controller{
    
    const VIEW_PATH = 'pages';
    
    public function __construct() {
        $this->middleware('auth')->except(['getAbout', 'getContact']);
    }
    
    /*
     * Return the about page
     * 
     * @return \Illuminate\Http\Response
     */
    public function getAbout() {
        return view(self::VIEW_PATH.'/about');
    }
    
    /*
     * Return the contact page
     * 
     * @return \Illuminate\Http\Response
     */
    public function getContact() {
        return view(self::VIEW_PATH.'/contact');
    }
    
    /*
     * Return the home page
     * 
     * @return \Illuminate\Http\Response
     */
    public function getIndex() {
        
        $importantNotes = Note::select('id', 'title', 'slug')->where('important', true)
        ->orderBy('created_at', 'desc')->limit(3)->get();
        $noImportant = 'alert-warning';
        
        if($importantNotes->count() < 1){
            $importantNotes = Note::select('id', 'title', 'slug')
            ->orderBy('created_at', 'desc')->limit(3)->get();
            $noImportant = false;
        }
        
        return view(self::VIEW_PATH.'/welcome', 
        ['importantNotes' => $importantNotes, 'noImportant' => $noImportant]);
    }
    
}
