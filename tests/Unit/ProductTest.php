<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Product;

class ProductTest extends TestCase {

    use RefreshDatabase,
        WithFaker;

    private function attributes() {
        return [
            'name' => 'First product name',
            'description' => 'First product cool description',
        ];
    }

    /** @test */
    public function product_can_be_added() {
        Product::create($this->attributes());
        $this->assertCount(1, Product::all());
    }

}
