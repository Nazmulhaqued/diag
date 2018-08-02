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

    public function deleteThePatient($patient_id){
        $category_info = DB::table('patients')
        ->where('patient_id',$patient_id)
        ->delete();

        Session::put('deleteCategory','Patient deleted Successfully');
        return Redirect::to('/manage-patient');
    }

    public function updateThePatient(Request $request){

        $patient_id = $request->patient_id;
        $sum['patient_name'] = $request->patient_name;
        $sum['gender'] = $request->gender;
        $sum['age'] = $request->age;
        $sum['doctorrefs_id'] = $request->doctorrefs_id;
        $t_n = $request->test_name;
        if($t_n){   
        $sum['test_name'] = implode(', ' ,$request->test_name);
        }
        $t_p = $request->test_price;
        if($t_p){ 
        $sum['test_price'] = $request->test_price;
        }
        $c_t = $request->commission_total;
        if($c_t){ 
        $sum['commission_total'] = $request->commission_total;
        }
        $sum['publicationStatus'] = $request->publicationStatus;
        $sum['total_due'] = $request->due;
        $sum['price_total'] = $request->price_total;
        $sum['commission_total'] = $request->commission_total;
        $commission_total = $request->commission_total;
        $due_paid_by = $request->due_paid_by;
        $due = $request->Paid -$request->due;
        $paid_1 = $request->paid;
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
                  ->where('patient_id',$patient_id)
                  ->update($sum);
        Session::put('updateCategory','Patients update Successfully');

    return Redirect::to('/manage-patient');
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
