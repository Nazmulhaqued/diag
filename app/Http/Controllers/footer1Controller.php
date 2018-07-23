<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class footer1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createfooter1()
    {
        return view('admin.footer1.create_footer1');
    }

    public function storefooter1(Request $request)
    {
        $data['address'] = $request->address;
        $data['link'] = $request->link;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['details'] = $request->details;
        $data['publication_status'] = $request->publication_status;
        /*Image upload*/

        $productImage = $request->file('Logo');

        $imageName = $productImage->getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $productImage->move($uploadPath,$imageName);
        $imageUrl = $uploadPath.$imageName;
        $data['logo'] = $imageUrl;

        DB::table('footer1')
                ->insert($data);
        Session::put('storeCategory','Footer1 Save Successfully');

        return view('admin.footer1.create_footer1');
    }




    public function controlfooter1()
    {
      $manage_footer1 = DB::table('footer1')
                        ->get();
      return view('admin.footer1.manage_footer1')
                ->with('manage_footer1',$manage_footer1);
    }

    public function editThefooter1 ($id)
    {
      $footer1_info = DB::table('footer1')
                        ->where('footer1_id',$id)
                        ->first();
      return view('admin.footer1.edit_footer1')
                ->with('footer1_info',$footer1_info);
    }

    public function updateThefooter1(Request $request){
        $footer1_id = $request->footer1_id;
        $data['link'] = $request->link;
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['details'] = $request->details;
        $data['publication_status'] = $request->publication_status;
        /*Product upload*/
        $image = $request->file('image');
        if($image){
        $imageName = $image->getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $image->move($uploadPath,$imageName);
        $imageUrl = $uploadPath.$imageName;
        $data['logo'] = $imageUrl;
        }
        DB::table('footer1')
                ->where('footer1_id',$footer1_id )
                ->update($data);

        Session::put('updateSlider','Banner Ad1 updated Successfully');

    return Redirect::to('/manage-footer1');
    }

     public function deleteThefooter1($footer1_id)
    {
      $manage_slider = DB::table('footer1')
                        ->where('footer1_id',$footer1_id)
                        ->delete();
      Session::put('deleteSlider','Footer1 Item deleted Successfully');
        return Redirect::to('/manage-footer1');
    }


    public function showSlider()
    {
      $footer1_info = DB::table('footer1')
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
