<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
session_start();
class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authCheck();
        return view('admin.pages.dashboard');
    }

    public function authCheck(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return view('admin.pages.dashboard');
           }else{
             return Redirect::to('/admin')->send();
           }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageOrders()
    {
        $allOrders = DB::table('order')
            ->join('tbl_customer_table', 'order.customer_id', '=', 'tbl_customer_table.customer_id')
            ->join('payment', 'order.payment_id', '=', 'payment.payment_id')
            ->join('shipping', 'order.shipping_id', '=', 'shipping.shipping_id')
            ->select('order.*','shipping.*','tbl_customer_table.customer_name', 'payment.payment_type')
            ->get();
        return view('admin.pages.manage_order')
            ->with('allOrders',$allOrders);
    }
    
    public function viewOrders($order_id)
    {
        $singleOrders = DB::table('order')
            ->select('order.*', 'payment.payment_status', 'payment.payment_type')
            ->join('payment', 'order.payment_id', '=', 'payment.payment_id')
            ->where('order_id',$order_id)
            ->first();

        $CustomerData = DB::table('tbl_customer_table')
            ->where('customer_id',$singleOrders->customer_id)
            ->first();

        $ShippingData = DB::table('shipping')
            ->where('shipping_id',$singleOrders->shipping_id)
            ->first();

        $order_details = DB::table('order_details')
            ->where('order_id',$singleOrders->order_id)
            ->get();

         $singleOrders = DB::table('order')
            ->select('order.*', 'payment.payment_status', 'payment.payment_type')
            ->join('payment', 'order.payment_id', '=', 'payment.payment_id')
            ->where('order_id',$order_id)
            ->first();

        return view('admin.pages.view_order')
            ->with('singleOrders',$singleOrders)
            ->with('CustomerData',$CustomerData)
            ->with('order_details',$order_details)
            ->with('ShippingData',$ShippingData);
    }

     public function updateOrder(Request $request)
    {
      // Shipping address
        $data= array();
        $shipping_id = $request->shipping_id;

        $data_s['shipping_name'] = $request->shipping_name;
        $data_s['address'] = $request->address;
        $data_s['city'] = $request->city;
        $data_s['country'] = $request->country;
        $data_s['zip_code'] = $request->zip_code;
        $data_s['mobile'] = $request->mobile;

    // Invoice Info payment table
        $payment_id = $request->payment_id;

        $data_iv['created_at'] = $request->created_at;
        $data_iv['payment_type'] = $request->payment_type;
        $data_iv['payment_status'] = $request->payment_status;

        // order details table
        $order_details_id = $request->order_details_id;

        echo $order_details_id;

        $data_od['product_name'] = $request->product_name;
        $data_od['product_quantity'] = $request->product_quantity;
        $data_od['product_price'] = $request->product_price;

        // order tabl
        $order_id = $request->order_id;
        $data_os['order_status'] = $request->order_status;
        $data_os['order_total'] = $request->order_total;


         DB::table('shipping')
                ->where('shipping_id',$shipping_id )
                ->update($data_s);

          DB::table('payment')
                ->where('payment_id',$payment_id )
                ->update($data_iv);

         DB::table('order_details')
                ->where('order_details_id',$order_details_id )
                ->where('order_id',$order_id )
                ->update($data_od);

         DB::table('order')
                ->where('order_id',$order_id )
                ->update($data_os);
    }

     public function editOrders($order_id)
    {
        
        $singleOrders = DB::table('order')
            ->select('order.*', 'payment.payment_status', 'payment.payment_type')
            ->join('payment', 'order.payment_id', '=', 'payment.payment_id')
            ->where('order_id',$order_id)
            ->first();

        $CustomerData = DB::table('tbl_customer_table')
            ->where('customer_id',$singleOrders->customer_id)
            ->first();

        $ShippingData = DB::table('shipping')
            ->where('shipping_id',$singleOrders->shipping_id)
            ->first();

        $order_details = DB::table('order_details')
            ->where('order_id',$singleOrders->order_id)
            ->get();

        return view('admin.pages.edit_Order')
           ->with('singleOrders',$singleOrders)
            ->with('CustomerData',$CustomerData)
            ->with('order_details',$order_details)
            ->with('ShippingData',$ShippingData);
    }

    public function deleteOrder($order_id)
    {

         $first = DB::table('order')
                ->where('order_id',$order_id )
                ->first();

         DB::table('order_details')
                ->where('order_id',$order_id )
                ->delete();
         DB::table('order')
                ->where('order_id',$first->order_id)
                ->delete();
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
