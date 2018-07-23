<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;
class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSubCategory(){
        return view('admin.pages.create_subcategory');
    }

    public function storeSubCategory(Request $request){
        $data['subcategoryName'] = $request->subcategoryName;
        $data['subcategory_url'] = str_slug($request->subcategoryName);
        $data['category_id'] = $request->category_id;
        $data['subcategoryDescription'] = $request->subcategoryDescription;
        $data['publicationStatus'] = $request->publicationStatus;

        $cat_data['subcategory_url'] = str_slug($request->subcategoryName);
        $cat_id = $request->category_id;

        DB::table('categories')
                    ->where('category_id',$cat_id)
                    ->update($cat_data);

        DB::table('subcategories')->insert($data);
        Session::put('storeCategory','Sub Category Save Successfully');
        return Redirect::to('/add-subcategory');
    }

    public function controlSubCategory(){
        $subcategory_names = DB::table('subcategories')
                ->get();
        return view('admin.pages.manage_subcategory')
            ->with('subcategory_names',$subcategory_names);
    }
    public function showSubCategory($cat_id){
        $single_category = DB::table('subcategories')
        ->where('category_id',$cat_id)
        ->first();
        return view ('admin.pages.single_category')
            ->with('single_category',$single_category);
    } 
    public function editTheSubCategory($subcategory_id){
        $subcategory_info = DB::table('subcategories')
        ->where('subcategory_id',$subcategory_id)
        ->first();
        return view ('admin.pages.edit_subcategory')
            ->with('subcategory_info',$subcategory_info);
    }

    public function deleteTheSubCategory($cat_id){
        $category_info = DB::table('subcategories')
        ->where('subcategory_id',$cat_id)
        ->delete();

        Session::put('deleteCategory','Sub Category deleted Successfully');
        return Redirect::to('/manage-subcategory');
    }

    public function updateTheSubCategory(Request $request){
        $subcategory_id = $request->subcategory_id;
        $data['category_id'] = $request->category_id;
        $data['subcategoryName'] = $request->subcategoryName;
        $data['subcategoryDescription'] = $request->subcategoryDescription;
        $data['publicationStatus'] = $request->publicationStatus;
        DB::table('subcategories')
                ->where('subcategory_id',$subcategory_id )
                ->update($data);
        Session::put('updateCategory','SubCategory updated Successfully');

    return Redirect::to('/manage-subcategory/');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
