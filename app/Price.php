<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model {

    protected $guarded = [];
    
    public function path() {
        return '/prices/'.$this->id;
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
    
}
