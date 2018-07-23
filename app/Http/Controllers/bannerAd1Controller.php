<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class bannerAd1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBanner1()
    {
        return view('admin.bannerAd1.create_bannerAd1');
    }

    public function storeBanner1(Request $request)
    {
        $data['link'] = $request->link;
        $data['publication_status'] = $request->publication_status;
        /*Image upload*/

        $productImage = $request->file('image');
        $imageName = $productImage->getClientOriginalName();
        $uploadPath = 'public/sliderImage/';
        $productImage->move($uploadPath,$imageName);
        $imageUrl = $uploadPath.$imageName;
        $data['image'] = $imageUrl;

        DB::table('bannerad1')
                ->insert($data);
        Session::put('storeCategory','Banner Save Successfully');

        return view('admin.bannerAd1.create_bannerAd1');
    }




    public function controlBanner1()
    {
      $manage_bannerAd1 = DB::table('bannerad1')
                        ->get();
      return view('admin.bannerAd1.manage_bannerAd1')
                ->with('manage_bannerAd1',$manage_bannerAd1);
    }

    public function editTheBanner1 ($id)
    {
      $bannerAd1_info = DB::table('bannerad1')
                        ->where('bannerAd1_id',$id)
                        ->first();
      return view('admin.bannerAd1.edit_bannerAd1')
                ->with('bannerAd1_info',$bannerAd1_info);
    }

    public function updateTheBanner1(Request $request){
        $bannerAd1_id = $request->bannerAd1_id;
        $data['link'] = $request->link;
        $data['publication_status'] = $request->publication_status;
        
        /*Product upload*/
        $image = $request->file('image');

        if($image){
        $imageName = $image->getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $image->move($uploadPath,$imageName);
        $imageUrl = $uploadPath.$imageName;
        $data['image'] = $imageUrl;
        }
        DB::table('bannerad1')
                ->where('bannerAd1_id',$bannerAd1_id )
                ->update($data);

        Session::put('updateSlider','Banner Ad1 updated Successfully');

    return Redirect::to('/manage-banner1');
    }

     public function deleteTheBanner1($bannerAd1_id)
    {
      $manage_slider = DB::table('bannerad1')
                        ->where('bannerAd1_id',$bannerAd1_id)
                        ->delete();
      Session::put('deleteSlider','Banner Ad1 deleted Successfully');
        return Redirect::to('/manage-banner1');
    }


    public function showSlider()
    {
      $bannerad1_info = DB::table('bannerad1')
                        ->where('publication_status',1)
                        ->get();
      return view('home.home_content')
                ->with('bannerad1_info',$bannerad1_info);
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
