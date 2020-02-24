<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Price;

class ProductsController extends Controller {

    private function validateRequest() {
        return request()->validate([
                    'name' => 'required',
                    'description' => 'required',
        ]);
    }

    public function index() {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    
    public function show(Product $product) {
//        dd($product);
//        $prices = Price::where('product_id', $product->id);
        return view('products.show', ['product'=>$product
//                , 'prices'=>$prices
                ]);
    }
    
        public function create() {
        return view('products.create');
    }
    
    public function store() {
        $product = Product::create($this->validateRequest());
        Price::create([
            'product_id'=>$product->id,
            'name'=>'regular',
            'value'=>0
        ]);
        return redirect('/products/' . $product->id);
    }
    
    public function destroy($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect('/products');
    }

    public function update(Product $product) {
        $names = request('names');
        $values = request('values');
        foreach($names as $id=>$name){
            Price::find($id)->update([
                'name'=>$name,
                'value'=>floatval($values[$id]),
            ]);
        }
        $product->update($this->validateRequest());
        return redirect('/products/'.$product->id);
    }
    
}
