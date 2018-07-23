<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class Footer2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createfooter2()
    {
        return view('admin.footer2.create_footer2');
    }

    public function storefooter2(Request $request)
    {
        $data['title'] = $request->title;
        $data['page_name'] = $request->page_name;
        $data['link'] = $request->link;
        $data['publication_status'] = $request->publication_status;

        DB::table('footer2')
                ->insert($data);
        Session::put('storeCategory','Footer2 Save Successfully');

        return view('admin.footer2.create_footer2');
    }




    public function controlfooter2()
    {
      $manage_footer2 = DB::table('footer2')
                        ->get();
      return view('admin.footer2.manage_footer2')
                ->with('manage_footer2',$manage_footer2);
    }

    public function editThefooter2 ($id)
    {
      $footer2_info = DB::table('footer2')
                        ->where('footer2_id',$id)
                        ->first();
      return view('admin.footer2.edit_footer2')
                ->with('footer2_info',$footer2_info);
    }

    public function updateThefooter2(Request $request){
        $footer2_id = $request->footer2_id;
        $data['title'] = $request->title;
        $data['page_name'] = $request->page_name;
        $data['link'] = $request->link;
        $data['publication_status'] = $request->publication_status;
        
        DB::table('footer2')
                ->where('footer2_id',$footer2_id )
                ->update($data);

        Session::put('updateSlider','Banner Ad2 updated Successfully');

        return Redirect::to('/manage-footer2');
    }

     public function deleteThefooter2($footer2_id)
    {
      $manage_slider = DB::table('footer2')
                        ->where('footer2_id',$footer2_id)
                        ->delete();
      Session::put('deleteSlider','Footer2 Item deleted Successfully');
        return Redirect::to('/manage-footer2');
    }


    public function showSlider()
    {
      $footer2_info = DB::table('footer2')
                        ->where('publication_status',2)
                        ->get();
      return view('home.home_content')
                ->with('footer2_info',$footer2_info);
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
