<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(Supplier::rules(), Supplier::messages());

        Supplier::create($request->except('_token'));
        return redirect('suppliers')->with('success','');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $supplier = Supplier::findOrFail($id);
    
        $request->validate(Supplier::rules($id), Supplier::messages());
    
        $supplier->name = $request->input('name');
        $supplier->cnpj = $request->input('cnpj');
        $supplier->location = $request->input('location');
        $supplier->phone = $request->input('phone');
        $supplier->email = $request->input('email');
    
        $supplier->save();
        return redirect('suppliers')->with('success','');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $ids = $request->input('selected_ids');
    
        if ($ids) {
            $idsArray = explode(',', $ids);    
            Supplier::whereIn('id', $idsArray)->delete();
        }
        
        return redirect()->route('suppliers')->with('success', value: '');
    }
    
}
