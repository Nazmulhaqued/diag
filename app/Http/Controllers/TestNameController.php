<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;
class TestNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTest(){
        return view('admin.pages.create_test_name');
    }

    public function storeTestInfo(Request $request){
        $data['test_name'] = $request->testName;
        $data['test_description'] = $request->testDescription;
        $data['test_price'] = $request->price;
        $commission = $request->commission;
        $price = $request->price;
        $data['test_commission'] = $commission*$price /100;
        $data['publication_status'] = $request->publicationStatus;

        DB::table('test_names')->insert($data);
        Session::put('storeCategory','Test Name Save Successfully');
        return Redirect::to('/add-test');
    }

    public function controlTestName(){
        $subcategory_names = DB::table('test_names')
                ->get();
        return view('admin.pages.manage_test_name')
            ->with('subcategory_names',$subcategory_names);
    }
    public function showSubCategory($cat_id){
        $single_category = DB::table('test_names')
        ->where('test_name_id',$cat_id)
        ->first();
        return view ('admin.pages.single_category')
            ->with('single_category',$single_category);
    } 
    public function editTheSubCategory($subcategory_id){
        $subcategory_info = DB::table('test_names')
        ->where('test_name_id',$subcategory_id)
        ->first();
        return view ('admin.pages.edit_test_name')
            ->with('subcategory_info',$subcategory_info);
    }

    public function deleteTheSubCategory($cat_id){
        $category_info = DB::table('test_names')
        ->where('test_name_id',$cat_id)
        ->delete();

        Session::put('deleteCategory','Test Information deleted Successfully');
        return Redirect::to('/manage-test');
    }

    public function updateTestInfo(Request $request){

        $test_name_id = $request->test_name_id;

        $data['test_name'] = $request->testName;
        $data['test_description'] = $request->testDescription;
        $data['test_price'] = $request->price;
        $data['test_commission'] = $request->commission;
        $data['publication_status'] = $request->publicationStatus;
        DB::table('test_names')
                ->where('test_name_id',$test_name_id )
                ->update($data);
        Session::put('updateCategory','Test Information updated Successfully');

    return Redirect::to('/manage-test/');
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
