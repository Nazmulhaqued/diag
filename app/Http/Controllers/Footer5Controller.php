<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class Footer5Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function createfooter5()
    {
        return view('admin.footer5.create_footer5');
    }

    public function storefooter5(Request $request)
    {
        $data['title'] = $request->title;
        $data['page_name'] = $request->page_name;
        $data['link'] = $request->link;
        $data['publication_status'] = $request->publication_status;

        DB::table('footer5')
                ->insert($data);
        Session::put('storeCategory','Footer5 Save Successfully');

        return view('admin.footer5.create_footer5');
    }




    public function controlfooter5()
    {
      $manage_footer5 = DB::table('footer5')
                        ->get();
      return view('admin.footer5.manage_footer5')
                ->with('manage_footer5',$manage_footer5);
    }

    public function editThefooter5 ($id)
    {
      $footer5_info = DB::table('footer5')
                        ->where('footer5_id',$id)
                        ->first();
      return view('admin.footer5.edit_footer5')
                ->with('footer5_info',$footer5_info);
    }

    public function updateThefooter5(Request $request){
        $footer5_id = $request->footer5_id;
        $data['title'] = $request->title;
        $data['page_name'] = $request->page_name;
        $data['link'] = $request->link;
        $data['publication_status'] = $request->publication_status;
        
        DB::table('footer5')
                ->where('footer5_id',$footer5_id )
                ->update($data);

        Session::put('updateSlider','Banner Ad5 updated Successfully');

        return Redirect::to('/manage-footer5');
    }

     public function deleteThefooter5($footer5_id)
    {
      $manage_slider = DB::table('footer5')
                        ->where('footer5_id',$footer5_id)
                        ->delete();
      Session::put('deleteSlider','Footer5 Item deleted Successfully');
        return Redirect::to('/manage-footer5');
    }


    public function showSlider()
    {
      $footer5_info = DB::table('footer5')
                        ->where('publication_status',5)
                        ->get();
      return view('home.home_content')
                ->with('footer5_info',$footer5_info);
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
