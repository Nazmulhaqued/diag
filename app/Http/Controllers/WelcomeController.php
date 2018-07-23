<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class WelcomeController extends Controller
{
   public function index(){
      return view('home.home_content');
   }

   public function test(){
   	return view('test');
   }

   public function category($category_url){
      $category_image = DB::table('categories')
                  ->where('category_url',$category_url)
                  ->where('publicationStatus',1)
                  ->first();
      $category_product = DB::table('product')
                  ->where('category_url',$category_url)
                  ->where('publicationStatus',1)
                  ->paginate(6);
      return view('pages.category_content')
                  ->with('category_image',$category_image)
                  ->with('category_product',$category_product);
   }
   public function manufacturer($manufacturer_id){
      $manufacturer_product = DB::table('product')
                  ->where('manufacturer_id',$manufacturer_id)
                  ->where('publicationStatus',1)
                  ->paginate(6);
                  
      return view('pages.manufacturer_content')
                  ->with('manufacturer_product',$manufacturer_product);
   }
   public function subcategory($subcategory_url){

      $subcategory_product = DB::table('product')
                  ->where('subcategory_url',$subcategory_url)
                  ->where('publicationStatus',1)
                  ->get();
      $subcategory = DB::table('subcategories')
                  ->where('subcategory_url',$subcategory_url)
                  ->where('publicationStatus',1)
                  ->first();
     $category_image = DB::table('categories')
                  ->where('category_id',$subcategory->category_id)
                  ->where('publicationStatus',1)
                  ->first();
                  
   	return view('pages.subcategory_content')
                  ->with('subcategory_product',$subcategory_product)
                  ->with('category_image',$category_image);
   }

   public function productDetails($product_url){
      $single_product = DB::table('product')
                  ->where('product_url',$product_url)
                  ->where('publicationStatus',1)
                  ->first();
      $data['hit_count']= $single_product->hit_count + 1;
              DB::table('product')
               ->where('product_url',$product_url)
               ->update($data);
      $related_product = DB::table('product')
               ->where('category_url',$single_product->category_url)
               ->get();
                 
   	return view('product.product_details')
               ->with('single_product', $single_product)
               ->with('related_product', $related_product);
   }
    /* List By Price Range */
    public function searchPrice(Request $request) {
        $amount = $request->amount;
        $amount2 = $request->amount2;
        $all_product = DB::table('product')
               ->where('productPrice', '>=', $amount)
               ->where('productPrice', '<=', $amount2)
               // ->whereBetween('productPrice', [$amount, $amount2])
               ->orderBy('product_id','desc')
               ->paginate(8);
        return view('pages.search_pricecontent')
                  ->with('all_product', $all_product);
    }
    

   public function contact(){
      return view('pages.contact');
   }

   public function searchProduct(Request $request){
      $product_title = $request->product_search;
      $catid_text = $request->input('show-categories');
      $search = DB::table('product')
               ->where('productName','like','%'.$product_title.'%')
               ->where('category_url','like','%'.$catid_text.'%')
               ->orderBy('product_id','desc')
               ->paginate(8);
               
       return view('pages.search_content')
                   ->with('search',$search);

   }
   public function cartCheck(){
   	
   }
}
