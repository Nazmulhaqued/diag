<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPatient(){
        return view('admin.patient.create_patient');
    }

    public function storePatient(Request $request){
        // dd($request);
        $data['patient_name'] = $request->patient_name;
        $data['gender'] = $request->gender;
        $data['age'] = $request->age;
        $data['doctorrefs_id'] = $request->doctorrefs_id;

        $data['test_name'] = implode(', ' ,$request->test_name);

        // $test_price = DB::table('test_names')
        //         ->where('test_name_id',$test_id)
        //         ->first();

        $data['test_price'] = implode(', ' ,$request->test_price);
        $data['commission_total'] = implode(', ' ,$request->test_commission);
        $commission = implode(', ' ,$request->test_commission);
    
        $data['publicationStatus'] = $request->publicationStatus;

         $patient_id_is = DB::table('patients')
                ->insertGetId($data);
         
         $patients = DB::table('patients')
                          ->where('patient_id',$patient_id_is)
                          ->first();

          $explodevalue =  explode(',', $patients->test_price);
          $sum['price_total'] = array_sum($explodevalue);
          $price_total = array_sum($explodevalue);
          $commission =  explode(',', $patients->commission_total);
          $commission_total = array_sum($commission);
          $due_paid_by = $request->due_paid_by;
          $paid_1 = $request->paid;
          $price_t = $price_total;
          $due = $price_t - $paid_1;
          if($due_paid_by !== NULL && $due !== NULL){
             $sum['commission_total'] =$commission_total -$due;
             $sum['total_paid'] = $due +$paid_1;
             $sum['total_due'] = 0;
          }else if($due_paid_by == NULL && $due !== NULL){
             $sum['total_paid'] = $paid_1;
             $sum['commission_total'] = $commission_total;
             $sum['total_due'] = $due;
          }else{
            $sum['total_paid'] = $paid_1;
            $sum['commission_total'] = $commission_total;
            $sum['total_due'] = $due;
          }
         

          DB::table('patients')
                  ->where('patient_id',$patient_id_is)
                  ->update($sum);

        Session::put('storeCategory','Patient Test Save Successfully');
        return Redirect::to('/add-patient');
    }

    public function controlPatient(){
        $all_patients  = DB::table('patients')
                ->get();
        return view('admin.patient.manage_patient')
            ->with('all_patients',$all_patients );
    }
    public function showPatient($product_id){
        $patient_info = DB::table('patients')
                            ->where('patient_id',$product_id)
                            ->first();

        return view ('admin.patient.single_patient')
                ->with('patient_info',$patient_info);
     } 
    public function editThePatient($product_id){
            $patient_info = DB::table('patients')
                ->where('patient_id',$product_id)
                ->first();

        return view ('admin.patient.edit_patient')
            ->with('patient_info',$patient_info);
    }

    public function deleteThePatient($cat_id){
        $category_info = DB::table('product')
        ->where('product_id',$cat_id)
        ->delete();

        Session::put('deleteCategory','Product deleted Successfully');
        return Redirect::to('/manage-product');
    }

    public function updateThePatient(Request $request){
        $product_id = $request->product_id;
        $data['productName'] = $request->product_name;
        $data['manufacturer_id'] = $request->manufacturer_id;
        $data['category_url'] = $request->category_url;
        $data['subcategory_url'] = $request->subcategory_url;
        $data['productQuantity'] = $request->product_quantity;
        $data['productPrice'] = $request->product_price;
        $data['deals_upto'] = $request->deals_upto;
        $data['productShortdescription'] = $request->product_Shortdescription;

        $data['productLongdescription'] = $request->productLongdescription;
        $data['publicationStatus'] = $request->publicationStatus;
        
        /*Product Featured Image update*/
        DB::table('product')
                ->where('product_id',$product_id )
                ->update($data);

        Session::put('updateCategory','Product update Successfully');

    return Redirect::to('/manage-product');
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
