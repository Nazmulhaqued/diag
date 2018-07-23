<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class bannerAd3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBanner3()
    {
        return view('admin.bannerAd3.create_bannerAd3');
    }

    public function storeBanner3(Request $request)
    {

        $data['link1'] = $request->link;
        $data['link2'] = $request->link;
        $data['link3'] = $request->link;
        $data['publication_status'] = $request->publication_status;
        
        /*Image1 upload*/
        $productImage = $request->file('image1');
        $imageName = $productImage->getClientOriginalName();
        $uploadPath = 'public/sliderImage/';
        $productImage->move($uploadPath,$imageName);
        $imageUrl = $uploadPath.$imageName;
        $data['image1'] = $imageUrl;

        /*Image2 upload*/
        $productImage = $request->file('image2');
        $imageName = $productImage->getClientOriginalName();
        $uploadPath = 'public/sliderImage/';
        $productImage->move($uploadPath,$imageName);
        $imageUrl = $uploadPath.$imageName;
        $data['image2'] = $imageUrl;

        /*Image3 upload*/
        $productImage = $request->file('image3');
        $imageName = $productImage->getClientOriginalName();
        $uploadPath = 'public/sliderImage/';
        $productImage->move($uploadPath,$imageName);
        $imageUrl = $uploadPath.$imageName;
        $data['image3'] = $imageUrl;


        DB::table('bannerad3')
                ->insert($data);
        Session::put('storeCategory','Banner Save Successfully');

        return view('admin.bannerAd3.create_bannerAd3');
    }




    public function controlBanner3()
    {
      $manage_bannerAd3 = DB::table('bannerad3')
                        ->get();
      return view('admin.bannerAd3.manage_bannerAd3')
                ->with('manage_bannerAd3',$manage_bannerAd3);
    }

    public function editTheBanner3 ($id)
    {
      $bannerAd3_info = DB::table('bannerad3')
                        ->first();
      return view('admin.bannerAd3.edit_bannerAd3')
                ->with('bannerAd3_info',$bannerAd3_info);
    }

    public function updateTheBanner3(Request $request){
        $bannerAd3_id = $request->bannerAd3_id;
        $data['link1'] = $request->link1;
        $data['link2'] = $request->link2;
        $data['link3'] = $request->link3;
        $data['publication_status'] = $request->publication_status;
        
        /*Banner Ad3 image1 upload*/
        $image1 = $request->file('image1');

        if($image1){
        $imageName = $image1->getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $image1->move($uploadPath,$imageName);
        $imageUrl = $uploadPath.$imageName;
        $data['image1'] = $imageUrl;
        }

         /*Banner Ad3 image2 upload*/
        $image2 = $request->file('image2');

        if($image2){
        $imageName = $image2->getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $image2->move($uploadPath,$imageName);
        $imageUrl = $uploadPath.$imageName;
        $data['image2'] = $imageUrl;
        }

         /*Banner Ad3 image3 upload*/
        $image3 = $request->file('image3');

        if($image3){
        $imageName = $image3->getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $image3->move($uploadPath,$imageName);
        $imageUrl = $uploadPath.$imageName;
        $data['image3'] = $imageUrl;
        }


        DB::table('bannerad3')
                ->where('bannerAd3_id',$bannerAd3_id )
                ->update($data);

        Session::put('updateSlider','Banner Ad3 updated Successfully');

    return Redirect::to('/manage-banner3');
    }

     public function deleteTheBanner3($bannerAd3_id)
    {
      $manage_slider = DB::table('bannerad3')
                        ->where('bannerAd3_id',$bannerAd3_id)
                        ->delete();
      Session::put('deleteSlider','Banner Ad3 deleted Successfully');
        return Redirect::to('/manage-banner3');
    }


    public function showSlider()
    {
      $bannerad3_info = DB::table('bannerad3')
                        ->where('publication_status',1)
                        ->get();
      return view('home.home_content')
                ->with('bannerad3_info',$bannerad3_info);
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
