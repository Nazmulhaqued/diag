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
    
        $data['publicationStatus'] = $request->publicationStatus;

         $patient_id_is = DB::table('patients')
                ->insertGetId($data);
        if($patient_id_is){
            Session::put('patient_id_is',$patient_id_is);
        }
         $patient_id = Session::get('patient_id_is');
         
         $patients = DB::table('patients')
                          ->where('patient_id',$patient_id)
                          ->first();

          $explodevalue =  explode(',', $patients->test_price);
          $sum['price_total'] = array_sum($explodevalue);

          $commission =  explode(',', $patients->commission_total);

          $sum['total_due'] = $sum['price_total'] - $request->paid;
          $due_paid_by = $request->due_paid_by;
          if($due_paid_by !== NULL){
            $sum['commission_total'] = $sum['commission_total'] = array_sum($commission); - $sum['total_due'] = $sum['price_total'] - $request->paid;
             $sum['total_paid'] =  $data['total_paid'] = $request->paid; + $sum['total_due'];
          }else{
             $data['total_paid'] = $request->paid;
             $sum['commission_total'] = array_sum($commission);
          }
         

          DB::table('patients')
                  ->where('patient_id',$patient_id)
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
        $single_products = DB::table('product')
                            ->where('product_id',$product_id)
                            ->first();

        $category_info = DB::table('categories')
                            ->where('category_url',$single_products->category_url)
                            ->first();
        if($single_products->subcategory_url !== NULL){
                 $subcategory_info = DB::table('subcategories')
                ->where('subcategory_url',$single_products->subcategory_url)
                ->first();  
                }

        return view ('admin.products.single_products')
                ->with('single_products',$single_products)
                ->with('category_info',$category_info)
                ->with('subcategory_info',$subcategory_info);
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
        $productImage = $request->file('productImage');

        if($productImage){
        $imageName = $productImage->getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $productImage->move($uploadPath,$imageName);
        $imageUrl = $uploadPath.$imageName;
        $data['productImage'] = $imageUrl;
        }

        /*Product Image1 update*/
        $productImage1 = $request->file('productImage1');

        if($productImage1){
        $imageName = $productImage1->getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $productImage1->move($uploadPath,$imageName);
        $imageUrl = $uploadPath.$imageName;
        $data['productImage1'] = $imageUrl;
        }

        /*Product Image2 update*/
        $productImage2 = $request->file('productImage2');

        if($productImage2){
        $imageName = $productImage2->getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $productImage2->move($uploadPath,$imageName);
        $imageUrl = $uploadPath.$imageName;
        $data['productImage2'] = $imageUrl;
        }

        /*Product Image3 update*/
        $productImage3 = $request->file('productImage3');

        if($productImage3){
        $imageName = $productImage3->getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $productImage3->move($uploadPath,$imageName);
        $imageUrl = $uploadPath.$imageName;
        $data['productImage3'] = $imageUrl;
        }

        /*Product Image4 update*/
        $productImage4 = $request->file('productImage4');

        if($productImage4){
        $imageName = $productImage4->getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $productImage4->move($uploadPath,$imageName);
        $imageUrl = $uploadPath.$imageName;
        $data['productImage4'] = $imageUrl;
        }
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
