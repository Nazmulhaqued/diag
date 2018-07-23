<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class serviceController extends Controller
{
   public function createService()
    {
        return view('admin.services.create_service');
    }

    public function storeService(Request $request)
    {
        $data['service_title'] = $request->service_title;
        $data['link'] = $request->link;
        $data['service_icon'] = $request->service_icon;
        $data['service_url'] = str_slug($request->service_title);
        $data['service_description'] = $request->service_description;
        $data['publication_status'] = $request->publication_status;

        DB::table('services')
                ->insert($data);
        Session::put('storeCategory','Service Save Successfully');

        return view('admin.services.create_service');
    }




    public function controlService()
    {
      $manage_services = DB::table('services')
                        ->get();
      return view('admin.services.manage_service')
                ->with('manage_services',$manage_services);
    }

    public function editTheService($id)
    {
      $service_item_info = DB::table('services')
                        ->where('services_id',$id)
                        ->first();
      return view('admin.services.edit_service')
                ->with('service_item_info',$service_item_info);
    }

    public function updateTheService(Request $request){
        $services_id = $request->services_id;
        $data['service_title'] = $request->service_title;
        $data['link'] = $request->link;
        $data['service_icon'] = $request->service_icon;
        $data['service_description'] = $request->service_description;
        $data['publication_status'] = $request->publication_status;
        
        DB::table('services')
                ->where('services_id',$services_id )
                ->update($data);

        Session::put('updateSlider','service updated Successfully');

    return Redirect::to('/manage-service');
    }

     public function deleteTheService($id)
    {
      $manage_slider = DB::table('services')
                        ->where('publication_status',1)
                        ->where('services_id',$id)
                        ->delete();
      Session::put('deleteSlider','service deleted Successfully');
        return Redirect::to('/manage-service');
    }


    public function showService()
    {
      $slider_info = DB::table('homeslider')
                        ->where('publication_status',1)
                        ->get();
      return view('home.home_content')
                ->with('services_info',$services_info);
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
