<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller {

    private function validateRequest() {
        return request()->validate([
                    'name' => 'required',
                    'description' => 'required',
        ]);
    }

    public function store() {
        $product = Product::create($this->validateRequest());
        return redirect('/products/' . $product->id);
    }
    
    public function destroy($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect('/products');
    }

    public function update(Product $product) {
        $product->update($this->validateRequest());
        return redirect('/products/'.$product->id);
    }
    
}
