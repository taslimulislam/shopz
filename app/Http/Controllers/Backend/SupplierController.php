<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Supplier;

class SupplierController extends Controller
{
    public function index(){

        $supplier = Supplier::paginate(10);

        return view('admin.supplier.index', compact('supplier'));
    }

    public function store(Request $request){

        $request->validate([
            'sup_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255']
        ]);
        // $service = new Service();
        // $service->fill($input);
        // $service->save();
        
        if(Supplier::create($request->all())){
            return redirect()->route('admin.supplier.index')->with('admin_success','Supplier created successfully.');
        }else {
            return redirect()->route('admin.supplier.index')->with('admin_exception','Somthing Went Wrong.');
            
        }

    }

    public function edit(Supplier $supplier)
    { 
        return response()->json($supplier);
      
    }

    public function update(Request $request, Supplier $supplier){

        $request->validate([
            'sup_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255']
        ]);

        if($supplier->update($request->all())){
            return redirect()->route('admin.supplier.index')->with('admin_success','Supplier Updated successfully.');
        }else {
            return redirect()->route('admin.supplier.index')->with('admin_exception','Somthing Went Wrong.');
            
        }
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('admin.supplier.index')->with('admin_success','Supplier deleted successfully');
    }
}
