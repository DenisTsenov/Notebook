<?php

namespace App\Http\Controllers;

/**
 * This controller manage for all static pages
 *
 * @author denis
 */
class PagesController extends Controller{
    
    const VIEW_PATH = 'pages';
    
    /*
     * Return the about page
     */
    public function getAbout() {
        return view(self::VIEW_PATH.'/about');
    }
    
    /*
     * Return the contact page
     */
    public function getContact() {
        return view(self::VIEW_PATH.'/contact');
    }
    
    /*
     * Return the home page
     */
    public function getIndex() {
        return view(self::VIEW_PATH.'/welcome');
    }
    
}
