<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class bannerAd2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBanner2()
    {
        return view('admin.bannerAd2.create_bannerAd2');
    }

    public function storeBanner2(Request $request)
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
        DB::table('bannerad2')
                ->insert($data);
        Session::put('storeCategory','Banner Save Successfully');

        return view('admin.bannerAd2.create_bannerAd2');
    }




    public function controlBanner2()
    {
      $manage_bannerAd2 = DB::table('bannerad2')
                        ->get();
      return view('admin.bannerAd2.manage_bannerAd2')
                ->with('manage_bannerAd2',$manage_bannerAd2);
    }

    public function editTheBanner2 ($id)
    {
      $bannerAd2_info = DB::table('bannerad2')
                        ->first();
      return view('admin.bannerAd2.edit_bannerAd2')
                ->with('bannerAd2_info',$bannerAd2_info);
    }

    public function updateTheBanner2(Request $request){
        $bannerAd2_id = $request->bannerAd2_id;
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
        DB::table('bannerad2')
                ->where('bannerAd2_id',$bannerAd2_id )
                ->update($data);

        Session::put('updateSlider','Banner Ad2 updated Successfully');

    return Redirect::to('/manage-banner2');
    }

     public function deleteTheBanner2($bannerAd2_id)
    {
      $manage_slider = DB::table('bannerad2')
                        ->where('bannerAd2_id',$bannerAd2_id)
                        ->delete();
      Session::put('deleteSlider','Banner Ad2 deleted Successfully');
        return Redirect::to('/manage-banner2');
    }


    public function showSlider()
    {
      $bannerad2_info = DB::table('bannerad2')
                        ->where('publication_status',1)
                        ->get();
      return view('home.home_content')
                ->with('bannerad2_info',$bannerad2_info);
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
