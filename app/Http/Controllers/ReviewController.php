<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function saveReview(Request $request)
    {
        $this->Validate($request,[
            'review'=>'required' 
        ],

        [
            'thing.required' => 'this is my custom error message for required'
        ]
    );

        $login_check = Session::get('customer_id');
        if($login_check !==NULL){
        $data = array();
        $data['product_id'] = $request->product_id;
        $data['user_id'] = $login_check;
        $data['user_name'] = Session::get('customer_name');
        $data['review_rating'] = $request->ratings;
        $data['review'] = $request->review;
        $data['publication_status'] = 0;

        DB::table('review')
                ->insert($data);
        return Redirect::to('/');
        }
        else{
            return Redirect::to('/checkout');
        }

    }

    public function controlReview(){
        $all_review = DB::table('review')
                ->get();
        return view('admin.reviews.manage_review')
            ->with('all_review',$all_review);
    }
    public function showReview($cat_id){
        $single_manufacturer = DB::table('review')
        ->where('manufacturers_id',$cat_id)
        ->first();
        return view ('admin.manufacturers.single_manufacturer')
            ->with('single_manufacturer',$single_manufacturer);
    } 
    public function editTheReview($review_id){
        $review_info = DB::table('review')
        ->where('review_id',$review_id)
        ->first();
        return view ('admin.reviews.edit_review')
            ->with('review_info',$review_info);
    }

    public function deleteTheReview($review_id){
        $category_info = DB::table('review')
        ->where('review_id',$review_id)
        ->delete();

        Session::put('deleteCategory','Review deleted Successfully');
        return Redirect::to('/manage-review');
    }

    public function updateTheReview(Request $request){
        
        $review_id = $request->review_id;
        $data['user_name'] = $request->user_name;
        $data['review'] = $request->review;
        $data['review_rating'] = $request->review_rating;
        $data['publication_status'] = $request->publicationStatus;
        DB::table('review')
                ->where('review_id',$review_id )
                ->update($data);
        Session::put('updateCategory','Review update Successfully');

    return Redirect::to('/manage-review');
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
