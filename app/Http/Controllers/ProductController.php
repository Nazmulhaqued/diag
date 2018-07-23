<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
use Carbon\Carbon;

// {{ \Carbon\Carbon::parse($v_user->from_date)->format('d/m/Y H:i:s')}}
// $v_user is foreach loop define_syslog_variable
// from_date is database field name 
// {{ \Carbon\Carbon::parse($v_product_info->created_at)->format('d/m/Y H:i:s')}}
// $data['time'] => dateTime('created_at')

// The most typical usage is for comments
// The instance is the date the comment was created and its being compared to default now()
// echo Carbon::now()->subDays(5)->diffForHumans();               // 5 days ago

// echo Carbon::now()->diffForHumans(Carbon::now()->subYear());   // 1 year after

// $dt = Carbon::createFromDate(2011, 8, 1);

// echo $dt->diffForHumans($dt->copy()->addMonth());              // 1 month before
// echo $dt->diffForHumans($dt->copy()->subMonth());              // 1 month after

// echo Carbon::now()->addSeconds(5)->diffForHumans();            // 5 seconds from now

// echo Carbon::now()->subDays(24)->diffForHumans();              // 3 weeks ago
// echo Carbon::now()->subDays(24)->diffForHumans(null, true);    // 3 weeks

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProduct(){
        return view('admin.products.create_product');
    }

    public function storeProduct(Request $request){

        $data['productName'] = $request->product_name;
        $data['product_url'] = str_slug($request->product_name);
        $data['category_url'] = $request->category_url;
        $data['subcategory_url'] = $request->subcategory_url;
        $data['manufacturer_id'] = $request->manufacturer_id;
        $data['productShortdescription'] = $request->productShortdescription;
        $data['productQuantity'] = $request->product_quantity;
        $data['productPrice'] = $request->product_price;
        $data['deals_upto'] = $request->deals_upto;
        $data['productShortdescription'] = $request->product_shortdescription;
        $data['productLongdescription'] = $request->product_Longdescription;
        $data['publicationStatus'] = $request->publicationStatus;

        /*Image upload*/

        $productImage = $request->file('productImage');
        $imageName = $productImage->getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $productImage->move($uploadPath,$imageName);
        $imageUrl = $uploadPath.$imageName;
        $data['productImage'] = $imageUrl;

         /*Image upload 1*/

        $productImage1 = $request->file('productImage1');
        if($productImage1 !==NULL){
        $imageName = $productImage1->getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $productImage1->move($uploadPath,$imageName);
        $imageUrl = $uploadPath.$imageName;
        $data['productImage1'] = $imageUrl;
        }

        /*Image upload 2*/
        $productImage2 = $request->file('productImage2');
         if($productImage2 !==NULL){
        $imageName = $productImage2->getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $productImage2->move($uploadPath,$imageName);
        $imageUrl = $uploadPath.$imageName;
        $data['productImage2'] = $imageUrl;
        }

         /*Image upload 3*/
        $productImage3 = $request->file('productImage3');

        if($productImage3 !==NULL){

        $imageName = $productImage3->getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $productImage3->move($uploadPath,$imageName);
        $imageUrl = $uploadPath.$imageName;
        $data['productImage3'] = $imageUrl;
       }
         /*Image upload 4*/
        
        $productImage4 = $request->file('productImage4');

        if($productImage4 !==NULL){

        $imageName = $productImage4->getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $productImage4->move($uploadPath,$imageName);
        $imageUrl = $uploadPath.$imageName;
        $data['productImage4'] = $imageUrl;
    }
        DB::table('product')
                ->insert($data);

        Session::put('storeCategory','Product Save Successfully');
        return Redirect::to('/add-product');
    }

    public function controlProduct(){
        $all_product  = DB::table('product')
                ->get();
        return view('admin.products.manage_products')
            ->with('all_product',$all_product );
    }
    public function showProduct($product_id){
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
    public function editTheProduct($product_id){
                        $products_info = DB::table('product')
                        ->where('product_id',$product_id)
                        ->first();
        return view ('admin.products.edit_product')
            ->with('products_info',$products_info);
    }

    public function deleteTheProduct($cat_id){
        $category_info = DB::table('product')
        ->where('product_id',$cat_id)
        ->delete();

        Session::put('deleteCategory','Product deleted Successfully');
        return Redirect::to('/manage-product');
    }

    public function updateTheProduct(Request $request){
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
