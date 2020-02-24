<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Price;
use App\Product;

class PricesController extends Controller
{
    private function validateRequest(){
        return request()->validate([
            'name'=>'required',
            'value'=>'required'
        ]);
    }
    
    public function create($product) {
        return view('prices/create', compact('product'));
    }
    
    public function store(Product $product) {
        $product->prices()->create($this->validateRequest());
        return redirect('/products/'.$product->id);
    }
    
    public function update(Price $price){
        $price->update($this->validateRequest());
        return redirect($price->product->path());
    }
    
    public function destroy(Price $price) {
      $price->delete();
      return redirect('/products/'.$price->product_id);
    }
}
