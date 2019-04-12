<?php

namespace App\Http\Controllers;

use App\Models\Note;

/**
 * This controller manage for all static pages
 *
 * @author denis
 */
class PagesController extends Controller{
    
    const VIEW_PATH = 'pages';
    
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
        
        $importantNotes = Note::select('id', 'title')->where('important', true)
        ->orderBy('created_at', 'desc')->limit(3)->get();
        
        return view(self::VIEW_PATH.'/welcome', ['importantNotes' => $importantNotes]);
    }
    
}
