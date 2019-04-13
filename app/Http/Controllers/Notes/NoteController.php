<?php

namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Note;
use Session;

class NoteController extends Controller {
    
    const STATUS_OK = 200;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $notes = DB::table('notes')->orderBy('created_at', 'desc')->paginate(3);

        return view('notes.index', ['notes' => $notes]);
    }

    /**
     * Display a listing of the resource using ajax request
     * 
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    function ajaxPagination(Request $request) {

        if ($request->ajax()) {

            $notes = DB::table('notes')->orderBy('created_at', 'desc')->paginate(3);

            return Response::json(['notes' => $notes], self::STATUS_OK);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //validate the data
        $request->validate([
            'title' => 'max:225',
            'content' => 'required|min:5|max:3000',
            'slug' => 'required|min:2|max:225|unique:notes,slug',
            'inportant' => 'boolean'
        ]);
        //call the Note model if the validation has passed
        $newNote = new Note();

        //store the data
        $newNote->title = $request->title;
        $newNote->content = $request->content;
        $newNote->slug = $request->slug;
        $newNote->important = $request->has('important');
        

        //save the record
        $newNote->save();

        //redirect to other page with flash message
        $request->session()->flash('success', 'Task was successfully created!'); //one request msg
        return redirect()->route('note.show', ['id' => $newNote->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
        $note = Note::find($id);
        
        return view('notes.show', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $note = Note::find($id);

        return view('notes.edit', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //validate the data
        $request->validate([
            'title' => 'max:225',
            'content' => 'required|min:5|max:3000',
            'slug' => 'required|alpha_dash|min:2|max:225|unique:notes,slug',
            'inportant' => 'boolean'
        ]);
        // find the record in the Db
        $editNote = Note::find($id);

        //store the data
       $newNote->title = $request->title;
        $newNote->content = $request->content;
        $newNote->slug = $request->slug;
        $newNote->important = $request->has('important');
        
        //save the record
        $editNote->save();

        //redirect to other page with flash message
        $request->session()->flash('success', 'Task was successfully edited!'); //one request msg
        return redirect()->route('note.show', ['id' => $editNote->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $noteToDelete = Note::find($id);
        $noteToDelete->delete();
        Session::flash('success', 'The post was deleted successfully.');

        return redirect()->route('note.index');
    }

}