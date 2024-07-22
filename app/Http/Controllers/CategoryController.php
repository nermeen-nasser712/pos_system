<?php

namespace App\Http\Controllers;
use  App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;




class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request)
     {
     $data = Category::all();
     return view('category.show_category',compact('data'));
     }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
     //$roles = Role::pluck('name','name')->all();
     //return view('users.add_user',compact('roles'));
     return view('category.add_category');
     }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
        $validatedData = $request->validate([
        'category_name' => 'required|unique:category_translations',
        ]);
         $input = $request->all();
         $category = Category::create($input);
         return redirect()->route('category.index')
         ->with('success','category created successfully');
     }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
     {
     $category = Category::find($id);
     return view('category.show',compact('category'));
     }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
     {
     $category = Category::find($id);
     //return $category;
     return view('category.edit',compact('category'));
     }
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
     {
     $this->validate($request, [
     'category_name' => 'required|unique:category_translations',
     ]);
     $input = $request->all();
     $category = Category::find($id);
     $category->update($input);
     return redirect()->route('category.index')
     ->with('success','category updated successfully');
     }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request)
     {
       // return $request;
         Category::find($request->category_id)->delete();
         return redirect()->route('category.index')
     ->with('success','category deleted successfully');
     }
     }