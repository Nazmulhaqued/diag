<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;
use Cart;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $shipping_id = Session::get('shipping_id');
      if($shipping_id !=NULL){
         return view('pages.payment');
      }else{
       return view('pages.checkout');
      }
    }
    public function billingShipping()
    {
       return view('pages.shipping');
    }
    public function customerRegistration(Request $request)
    {
       $data = array();
       $data['customer_name'] = $request->customer_name;
       $data['email_address'] = $request->email_address;
       $data['password'] = md5($request->password);
       $customer_id = DB::table('tbl_customer_table')
                ->insertGetId($data);
     if($customer_id){
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return Redirect::to('/billing-shipping');
     }
    }

    public function billingShippingAddress(Request $request){

       $data = array();
       // billing data 
       $customer_id = $request->customer_id;
       $data['mobile'] = $request->mobile_number;
       $data['address'] = $request->address;
       $data['city'] = $request->city;
       $data['country'] = $request->Country;
       $data['zip_code'] = $request->zip_code;

       $customer_id = DB::table('tbl_customer_table')
                ->where('customer_id',$customer_id)
                ->update($data);

       // shipping data
       $data['shipping_name'] = $request->shipping_name;
       $data['email_address'] = $request->email_address;

       $data['mobile'] = $request->mobile_number;
       $data['address'] = $request->address;
       $data['city'] = $request->city;
       $data['country'] = $request->Country;
       $data['zip_code'] = $request->zip_code;
       $date = $data['created_at'] = $request->created_at;

       $shipping_id =  DB::table('shipping')
                ->insertGetId($data);
        Session::put('shipping_id',$shipping_id);
        // Session::put('shipping_id');

        return Redirect::to('/payment');
    }
    
    public function loginCustomer(Request $request){

       $email = $request->email_address;
       $password = md5($request->password);

       $customer_login =  DB::table('tbl_customer_table')
                      ->where('email_address',$email)
                      ->where('password',$password)
                      ->first();
            $contents = Cart::content();
            $customer_id = Session::get('customer_id');
       if($customer_login != NULL && $contents != NULL){
        Session::put('customer_id', $customer_login->customer_id);
        Session::put('customer_name',$customer_login->customer_name);
        return Redirect::to('/billing-shipping');
       }
       elseif ($customer_login !=NULL ){
        dd($customer_login);
        Session::put('customer_id', $customer_login->customer_id);
        Session::put('customer_name',$customer_login->customer_name);
        return Redirect::to('/');
       }
       else{
        return Redirect::to('/checkout');
       }
    }

    public function logoutCustomer(){
        Session::put('customer_id','');
        Session::put('customer_name','');
        return Redirect::to('/');
    }

    public function loginCheck(){
       $customer_id = Session::get('customer_id');
       if($customer_id = NULL){
        return Redirect::to('/admin');
       }else{
        return Redirect::to('/billing-address');
       }
    }
    public function shipping(){
        $shipping = view('pages.shipping');
        return view('pages.shipping')
                ->with('main_content',$shipping);

    }
    
    public function payment(){
        $payment = view('pages.payment');
        return view('pages.payment');

    }
    public function saveOrder(Request $request){
      $payment_type = $request->payment_type;
      $pdata = array();
      $pdata['payment_type'] = $payment_type;
      $pdata['payment_status'] = 'pending';

      $payment_id = DB::table('payment')
                        ->insertGetId($pdata);

      $odata = array();
      $odata['customer_id'] = Session::get('customer_id');
      $odata['shipping_id'] = Session::get('shipping_id');
      $odata['payment_id'] = $payment_id;
      $odata['order_total'] = \Cart::subtotal(null,null,'');
      $order_id = DB::table('order')
                        ->insertGetId($odata);

      $oddata = array();
      $oddata['order_id'] = $order_id;

      $contents = \Cart::content();
      foreach ($contents as $v_contents) {
        $oddata['product_id'] = $v_contents->id;
        $oddata['product_name'] = $v_contents->name;
        $oddata['product_price'] = $v_contents->price;
        $oddata['product_quantity'] = $v_contents->qty;

        DB::table('order_details')
                        ->insert($oddata);
      }

      /* Start Successfull order Email*/


      /* End Send Email*/

      \Cart::destroy();

      if($payment_type == 'Cash_on_delivery'){
        return view('pages.order_complete');
      }
      if($payment_type == 'ssl_commerz'){
        return view('pages.order_complete');
      }
      if($payment_type == 'Paypal'){

        return view('pages.htmlWebsiteStandardPayment');
      }  

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
