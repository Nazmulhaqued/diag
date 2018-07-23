<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class Footer3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createfooter3()
    {
        return view('admin.footer3.create_footer3');
    }

    public function storefooter3(Request $request)
    {
        $data['title'] = $request->title;
        $data['page_name'] = $request->page_name;
        $data['link'] = $request->link;
        $data['publication_status'] = $request->publication_status;

        DB::table('footer3')
                ->insert($data);
        Session::put('storeCategory','Footer3 Save Successfully');

        return view('admin.footer3.create_footer3');
    }




    public function controlfooter3()
    {
      $manage_footer3 = DB::table('footer3')
                        ->get();
      return view('admin.footer3.manage_footer3')
                ->with('manage_footer3',$manage_footer3);
    }

    public function editThefooter3 ($id)
    {
      $footer3_info = DB::table('footer3')
                        ->where('footer3_id',$id)
                        ->first();
      return view('admin.footer3.edit_footer3')
                ->with('footer3_info',$footer3_info);
    }

    public function updateThefooter3(Request $request){
        $footer3_id = $request->footer3_id;
        $data['title'] = $request->title;
        $data['page_name'] = $request->page_name;
        $data['link'] = $request->link;
        $data['publication_status'] = $request->publication_status;
        
        DB::table('footer3')
                ->where('footer3_id',$footer3_id )
                ->update($data);

        Session::put('updateSlider','Banner Ad3 updated Successfully');

        return Redirect::to('/manage-footer3');
    }

     public function deleteThefooter3($footer3_id)
    {
      $manage_slider = DB::table('footer3')
                        ->where('footer3_id',$footer3_id)
                        ->delete();
      Session::put('deleteSlider','Footer3 Item deleted Successfully');
        return Redirect::to('/manage-footer3');
    }


    public function showSlider()
    {
      $footer3_info = DB::table('footer3')
                        ->where('publication_status',3)
                        ->get();
      return view('home.home_content')
                ->with('footer3_info',$footer3_info);
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
