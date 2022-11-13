<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CategoryRequest;
class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->data['main_menu'] = 'Products';
        $this->data['sub_menu']  = 'Categories';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories'] = Category::all();
        return view('category.categories',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['mode']       = 'create';
        $this->data['headline']   = 'Add new Category';

        return view('category.form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
         $categoryFormData = $request->all();

        if(Category::create($categoryFormData)){
            Session::flash('message',$categoryFormData['title'].' added successfully.');//ei message ta layout/main.blade.php file ekta section create kora ase alert msg dekhar jonno
        }
        return redirect()->to('categories');
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['category']    =  Category::findOrFail($id);
        $this->data['mode']        =  'edit';
        $this->data['headline']    =  'Update Category';
        return view('category.form',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        //$data              = $request->all();

        $category          = Category::find($id);
        $category->title   = $request->get('title');//$data['title'];
       
        

        if($category->save()){
            Session::flash('message','category updated successfully.');//ei message ta layout/main.blade.php file ekta section create kora ase alert msg dekhar jonno
        }
        return redirect()->to('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Category::find($id)->delete()){
            Session::flash('message','category deleted successfully.');//ei message ta layout/main.blade.php file ekta section create kora ase alert msg dekhar jonno
        }
        return redirect()->to('categories');
    }
}
