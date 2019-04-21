<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Session;
use DB;
class CategoryController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $categories =  DB::table('categories')->orderBy('created_at', 'desc')->paginate(3);;
        
        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validate([
            'name' => 'required|min:2|max:50|unique:categories',
        ]);
        
        $category = new Category();
        
        $category->name = $request->name;
        $category->save();
        
        $request->session()->flash('success', 'Category was successfully created!'); 
        
        return redirect()->route('category.show', ['id' => $category->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
        $category = Category::find($id);

        return view('categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        
        $category = Category::find($id);

        return view('categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
        $category = Category::find($id);
         
        $request->validate([
            'name' => ($category->slug != $request->slug) ? 'required|min:2|max:50|unique:categories' : '',
        ]);
        
        $category->name = $request->name;
        $category->save();
        
        $request->session()->flash('success', 'Category was successfully edited!'); 
        
        return redirect()->route('category.show', ['id' => $category->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $categoryToDelete = Category::find($id);
        $categoryToDelete->delete();
        Session::flash('success', 'The Category was deleted successfully.');

        return redirect()->route('category.index');
    }

}
