<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class CopyrightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCopyright()
    {
        return view('admin.copyright.create_copyright');
    }

    public function storeCopyright(Request $request)
    {
        $data['text'] = $request->text;
        $data['link'] = $request->link;

        DB::table('copyright')
                ->insert($data);
        Session::put('storeCategory','copyright Save Successfully');

        return view('admin.copyright.create_copyright');
    }




    public function controlCopyright()
    {
      $manage_copyright = DB::table('copyright')
                        ->get();
      return view('admin.copyright.manage_copyright')
                ->with('manage_copyright',$manage_copyright);
    }

    public function editTheCopyright ($id)
    {
      $copyright_info = DB::table('copyright')
                        ->where('copyright_id',$id)
                        ->first();
      return view('admin.copyright.edit_copyright')
                ->with('copyright_info',$copyright_info);
    }

    public function updateTheCopyright(Request $request){
        $copyright_id = $request->copyright_id;
        $data['text'] = $request->text;
        $data['link'] = $request->link;
        
        DB::table('copyright')
                ->where('copyright_id',$copyright_id )
                ->update($data);

        Session::put('updateSlider','copyright updated Successfully');

    return Redirect::to('/manage-Copyright');
    }

     public function deleteTheCopyright($copyright_id)
    {
      $manage_slider = DB::table('copyright')
                        ->where('copyright_id',$copyright_id)
                        ->delete();
      Session::put('deleteSlider','Copyright Item deleted Successfully');
        return Redirect::to('/manage-Copyright');
    }


    public function showSlider()
    {
      $footer1_info = DB::table('copyright')
                        ->where('publication_status',1)
                        ->get();
      return view('home.home_content')
                ->with('footer1_info',$footer1_info);
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
