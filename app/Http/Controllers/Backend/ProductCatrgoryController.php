<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\ProductCatrgory;

class ProductCatrgoryController extends Controller
{
    public function index(){

        $category = ProductCatrgory::paginate(10);

        return view('admin.product-category.index', compact('category'));
    }

    public function store(Request $request){

        $request->validate([
            'category_name' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255']
            
        ]);
        // $service = new Service();
        // $service->fill($input);
        // $service->save();
        
        if(ProductCatrgory::create($request->all())){
            return redirect()->route('admin.product-category.index')->with('admin_success','Prooduct Category created successfully.');
        }else {
            return redirect()->route('admin.product-category.index')->with('admin_exception','Somthing Went Wrong.');
            
        }



    }

    public function edit(ProductCatrgory $product_category)
    { 
        return response()->json($product_category);
      
    }

    public function update(Request $request, ProductCatrgory $product_category){

        $request->validate([
            'category_name' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255']
            
        ]);

        if($product_category->update($request->all())){
            return redirect()->route('admin.product-category.index')->with('admin_success','Prooduct Category Updated successfully.');
        }else {
            return redirect()->route('admin.product-category.index')->with('admin_exception','Somthing Went Wrong.');
            
        }
    }

    public function destroy(ProductCatrgory $product_category)
    {
        
        $product_category->delete();
        return redirect()->route('admin.product-category.index')->with('admin_success','Prooduct Category deleted successfully');
    }
}
