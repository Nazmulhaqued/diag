<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class Footer4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createfooter4()
    {
        return view('admin.footer4.create_footer4');
    }

    public function storefooter4(Request $request)
    {
        $data['title'] = $request->title;
        $data['page_name'] = $request->page_name;
        $data['link'] = $request->link;
        $data['publication_status'] = $request->publication_status;

        DB::table('footer4')
                ->insert($data);
        Session::put('storeCategory','Footer4 Save Successfully');

        return view('admin.footer4.create_footer4');
    }




    public function controlfooter4()
    {
      $manage_footer4 = DB::table('footer4')
                        ->get();
      return view('admin.footer4.manage_footer4')
                ->with('manage_footer4',$manage_footer4);
    }

    public function editThefooter4 ($id)
    {
      $footer4_info = DB::table('footer4')
                        ->where('footer4_id',$id)
                        ->first();
      return view('admin.footer4.edit_footer4')
                ->with('footer4_info',$footer4_info);
    }

    public function updateThefooter4(Request $request){
        $footer4_id = $request->footer4_id;
        $data['title'] = $request->title;
        $data['page_name'] = $request->page_name;
        $data['link'] = $request->link;
        $data['publication_status'] = $request->publication_status;
        
        DB::table('footer4')
                ->where('footer4_id',$footer4_id )
                ->update($data);

        Session::put('updateSlider','Banner Ad4 updated Successfully');

        return Redirect::to('/manage-footer4');
    }

     public function deleteThefooter4($footer4_id)
    {
      $manage_slider = DB::table('footer4')
                        ->where('footer4_id',$footer4_id)
                        ->delete();
      Session::put('deleteSlider','Footer4 Item deleted Successfully');
        return Redirect::to('/manage-footer4');
    }


    public function showSlider()
    {
      $footer4_info = DB::table('footer4')
                        ->where('publication_status',4)
                        ->get();
      return view('home.home_content')
                ->with('footer4_info',$footer4_info);
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
