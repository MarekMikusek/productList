<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Price;

class PricesController extends Controller
{
    private function validateRequest(){
        return request()->validate([
            'product_id'=>'required',
            'name'=>'required',
            'value'=>'required'
        ]);
    }
    
    public function store() {
        $price = Price::create($this->validateRequest());
        return redirect('/prices/'.$price->id);
    }
    
    public function update(Price $price){
        $price->update($this->validateRequest());
        return redirect($price->path());
    }
    
    public function destroy(Price $price) {
      $price->delete();
      return redirect('/products/'.$price->product_id);
    }
}
