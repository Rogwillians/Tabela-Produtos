<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        //var_dump(route('meu-nome'));
        $products = \App\Models\Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        return view('admin.products.create', ['product' => new \App\Product()]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $this->_validate($request); 
        \App\Product::create($data);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(\App\Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(\App\Product $product)
    {
        $clientType = $product->client_type;
        return view('admin.products.edit' ,compact('product', 'clientType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, \App\Product $product)
    {
        $data = $this->_validate($request);
        $product->fill($data);
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\App\Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('message','Cliente excluído com sucesso');
    }

    protected function _validate(Request $request) {


        $product = $request->route('product');
        $productId =  $product instanceof \App\Product? $product->id : null;
        $rules = [
            'name' => 'required|max:255',
            'serial_number' => "required|unique:products,serial_number,$productId",
            'quantity' => 'required',
            'value' => 'required',
            'purchase_date' => 'required',
            'obs' => 'max:255',
            
        ];
        
        return $this->validate($request, $rules);

        
        
       
    }

    public function massDelete(Request $request)
{
    $productIds = $request->product_id;

    if (!empty($productIds)) {
        // Excluir os produtos selecionados usando uma transação
       
            \App\Product::whereIn('id', $productIds)->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produtos selecionados excluídos com sucesso.');
    }

    return redirect()->route('products.index')
        ->with('error', 'Nenhum produto selecionado para exclusão.');
}

}
