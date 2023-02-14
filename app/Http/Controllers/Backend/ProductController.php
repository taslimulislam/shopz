<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;
use App\Models\Backend\ProductCatrgory;
use App\Models\Backend\ProductUnit;

class ProductController extends Controller
{
    public function index(){

        $product        = Product::with('productCatrgory','productUnit')->paginate(10);
        $producCategory = ProductCatrgory::where('status', 1)->get();
        $productUnit    = ProductUnit::all();

        return view('admin.product.index', compact(
            'product',
            'producCategory',
            'productUnit',
        ));
    }

    public function store(Request $request){

        $request->validate([

            'product_name'  => ['required', 'string', 'max:255'],
            'category_id'   => ['required', 'string', 'max:255'],
            'price'         => ['required', 'string', 'max:255'],
            'unit_id'       => ['required', 'string', 'max:255'],
            'product_model' => ['required', 'string', 'max:255'],
            'product_detail'=> ['required', 'string', 'max:255'],
            'status'        => ['required', 'string', 'max:255']
        ]);
        // $service = new Service();
        // $service->fill($input);
        // $service->save();
        
        if(Product::create($request->all())){
            return redirect()->route('admin.product.index')->with('admin_success','Product created successfully.');
        }else {
            return redirect()->route('admin.product.index')->with('admin_exception','Somthing Went Wrong.');
            
        }



    }

    public function edit(Product $product)
    { 
        return response()->json($product);
      
    }

    public function update(Request $request, Product $product){

        $request->validate([
            'product_name'  => ['required', 'string', 'max:255'],
            'category_id'   => ['required', 'string', 'max:255'],
            'price'         => ['required', 'string', 'max:255'],
            'unit_id'       => ['required', 'string', 'max:255'],
            'product_model' => ['required', 'string', 'max:255'],
            'product_detail'=> ['required', 'string', 'max:255'],
            'status'        => ['required', 'string', 'max:255']
            
        ]);

        if($product->update($request->all())){
            return redirect()->route('admin.product.index')->with('admin_success','Product Updated successfully.');
        }else {
            return redirect()->route('admin.product.index')->with('admin_exception','Somthing Went Wrong.');
            
        }
    }

    public function destroy(Product $product)
    {
        
        $product->delete();
        return redirect()->route('admin.product.index')->with('admin_success','Product deleted successfully');
    }
}
