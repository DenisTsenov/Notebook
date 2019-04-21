<?php

namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Note;
use Session;

class NoteController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    const STATUS_OK = 200;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $notes = DB::table('notes')->where('user_id', '=', Auth::id())
            ->orderBy('created_at', 'desc')->paginate(3);

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

            $notes = DB::table('notes')->orderBy('created_at', 'desc')
                ->where('user_id', '=', Auth::id())->paginate(3)->get();

            return Response::json(['notes' => $notes], self::STATUS_OK);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
        $categories = Category::pluck('name','id');
        
        return view('notes.create', ['categories' => $categories]);
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
            'category_id' => 'required|integer',
            'inportant' => 'boolean',
        ]);
        //call the Note model if the validation has passed
        $newNote = new Note();

        //store the data
        $newNote->title = $request->title;
        $newNote->content = $request->content;
        $newNote->slug = $request->slug;
        $newNote->slug = $request->slug;
        $newNote->category_id = $request->category_id;
        $newNote->user_id = Auth::id();
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

        $note = Note::where([
            ['id', '=', $id],
            ['user_id', '=', Auth::id()],
        ])->first();
        
        return view('notes.show', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $note = Note::where([
            ['id', '=', $id],
            ['user_id', '=', Auth::id()],
        ])->first();
        $categories = Category::all();
         
        $categoryHolder = [];
        foreach($categories as $category){
            $categoryHolder[$category->id] = $category->name;
        }
        
        return view('notes.edit', ['note' => $note, 'categories' => $categoryHolder]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        // find the record in the Db
        $editNote = Note::where([
            ['id', '=', $id],
            ['user_id', '=', Auth::id()],
        ])->first();

        //validate the data
        $request->validate([
            'title' => 'max:225',
            'content' => 'required|min:5|max:3000',
            'slug' => ($editNote->slug != $request->slug) ? 
            "required|alpha_dash|min:2|max:225|unique:notes,slug,$id" : '',
            'category_id' => 'required|integer',
            'inportant' => 'boolean',
        ]);

        //store the data
        $editNote->title = $request->title;
        $editNote->content = $request->content;
        $editNote->slug = $request->slug;
        $editNote->important = $request->has('important');
        $editNote->category_id = $request->category_id;

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
        $noteToDelete = Note::where([
            ['id', '=', $id],
            ['user_id', '=', Auth::id()],
        ])->first();
        
        $noteToDelete->delete();
        Session::flash('success', 'The note was deleted successfully.');

        return redirect()->route('note.index');
    }
}
