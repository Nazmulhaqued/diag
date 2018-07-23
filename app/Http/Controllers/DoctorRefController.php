<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;
class DoctorRefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDoctorRef(){
        return view('admin.pages.create_doctor_ref');
    }

    public function storeDoctorRef(Request $request){
        $data['doctorName'] = $request->doctorName;
        $data['doctor_url'] =str_slug($request->doctorName);
        $data['doctorDescription'] = $request->doctorDescription;
        $data['publicationStatus'] = $request->publicationStatus;

        DB::table('doctorrefs')->insert($data);
        Session::put('storeCategory','Doctor/Ref Save Successfully');
        return Redirect::to('/add-doctor');
    }

    public function controlCategory(){
        $all_category = DB::table('doctorrefs')
                ->get();
        return view('admin.pages.manage_doctor_ref')
            ->with('category_names',$all_category);
    }
    public function showCategory($cat_id){
        $single_category = DB::table('doctorrefs')
        ->where('doctorrefs_id',$cat_id)
        ->where('publicationStatus',1)
        ->first();
        return view ('admin.pages.single_category')
            ->with('single_category',$single_category);
    } 
    public function editTheCategory($cat_id){
        $category_info = DB::table('doctorrefs')
        ->where('doctorrefs_id',$cat_id)
        ->first();
        return view ('admin.pages.edit_category')
            ->with('category_info',$category_info);
    }

    public function deleteTheCategory($cat_id){
        $category_info = DB::table('doctorrefs')
        ->where('doctorrefs_id',$cat_id)
        ->delete();

        Session::put('deleteCategory','Doctor/ Ref deleted Successfully');
        return Redirect::to('/manage-doctor');
    }

    public function updateTheCategory(Request $request){
        $doctorrefs_id = $request->doctorrefs_id;
        $data['doctorName'] = $request->doctorName;
        $data['doctorDescription'] = $request->doctorDescription;
        $data['publicationStatus'] = $request->publicationStatus;

        DB::table('doctorrefs')
                ->where('doctorrefs_id',$doctorrefs_id )
                ->update($data);
        Session::put('updateCategory','Doctor update Successfully');

    return Redirect::to('/manage-doctor/');
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
