<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use DB;
use Cart;
use Session;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart($product_id)
    {

        $product_info = DB::table('product')
        ->where('product_id',$product_id)
        ->first();
        $delivery = 30;

        $data = array();
        $data['id'] = $product_info->product_id;
        $data['name'] = $product_info->productName;
        $data['price'] = $product_info->productPrice;
        // $data['price'] = 10.00;
        $data['qty'] = 1;
        $data['options']['image'] = $product_info->productImage;

       $cart_check = Cart::content();
       $check = count($cart_check);

        if($check == 0){
        $data['options']['delivery'] = $delivery;
        }

        Cart::add($data);

        return Redirect::to('/');
    }
    public function saveWishlist(Request $request)
    {
        $login_check = Session::get('customer_id');
        if($login_check !==NULL){
        $data = array();
        $data['product_id'] = $request->product_id;
        $data['user_id'] = Session::get('customer_id');

        DB::table('wishlist')
                ->insert($data);
                return Redirect::to('/');
        }
        else{
            return Redirect::to('/checkout');
        }

    }
    
     public function showWishlist(){
        return view('pages.show_wishlist');
    }
     public function deleteWishlist($product_id)
    {
        DB::table('wishlist')
                ->where('product_id',$product_id)
                ->delete();
        return Redirect::to('/show-wishlist');
    }

    /* Buy Now */

    public function buyNow($product_id)
    {

        $product_info = DB::table('product')
        ->where('product_id',$product_id)
        ->first();
         // $delivery = 30;

        $data = array();
        $data['id'] = $product_info->product_id;
        $data['name'] = $product_info->productName;
        $data['price'] = $product_info->productPrice;
        $data['qty'] = 1;
        $data['options']['image'] = $product_info->productImage;
        // $data['options']['delivery'] = $delivery+$product_info->productPrice;
        Cart::add($data);
        
        $contents = Cart::content();
        $customer_id = Session::get('customer_id');

        $login_check = Session::get('customer_id');
        if($login_check !=NULL){
        return Redirect::to('/billing-shipping');
       } else{
        return Redirect::to('/checkout');
       }
    }

    public function showCart(){
        return view('pages.show_cart');
    }
    
     public function deleteToCart($rowId)
    {
        Cart::remove($rowId);
        return Redirect::to('/show-cart');
    }
    public function homeDeleteToCart($rowId)
    {
        Cart::remove($rowId);
        return Redirect::to('/');
    }

    public function updateToCart(Request $request)
    {
        $qty = $request->qty;
        $rowId = $request->rowId;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
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
