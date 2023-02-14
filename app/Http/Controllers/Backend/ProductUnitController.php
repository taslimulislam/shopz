<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\ProductUnit;
class ProductUnitController extends Controller
{
    public function index(){

        $unit = ProductUnit::paginate(10);

        return view('admin.product-unit.index', compact('unit'));
    }

    public function store(Request $request){

        $request->validate([
            'unit_name' => ['required', 'string', 'max:255']
        ]);
        // $service = new Service();
        // $service->fill($input);
        // $service->save();
        
        if(ProductUnit::create($request->all())){
            return redirect()->route('admin.product-unit.index')->with('admin_success','Prooduct Unit created successfully.');
        }else {
            return redirect()->route('admin.product-unit.index')->with('admin_exception','Somthing Went Wrong.');
            
        }

    }

    public function edit(ProductUnit $product_unit)
    { 
        return response()->json($product_unit);
      
    }

    public function update(Request $request, ProductUnit $product_unit){

        $request->validate([
            'unit_name' => ['required', 'string', 'max:255']
        ]);

        if($product_unit->update($request->all())){
            return redirect()->route('admin.product-unit.index')->with('admin_success','Prooduct Unit Updated successfully.');
        }else {
            return redirect()->route('admin.product-unit.index')->with('admin_exception','Somthing Went Wrong.');
            
        }
    }

    public function destroy(ProductUnit $product_unit)
    {
        $product_unit->delete();
        return redirect()->route('admin.product-unit.index')->with('admin_success','Prooduct Unit deleted successfully');
    }
}
