<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Product;
use App\Price;

class ProductTest extends TestCase {

    use RefreshDatabase;

    private function attributes() {
        return [
            'name' => 'First product name',
            'description' => 'First product cool description',
        ];
    }

    /** @test */
    public function product_can_be_added() {
        $this->withoutExceptionHandling();
        $response = $this->post('/products', $this->attributes());
        $product = Product::first();
        $this->assertCount(1, Product::all());
        $this->assertCount(1, Price::all());
        $response->assertRedirect('/products/' . $product->id);
    }

    /** @test */
    public function product_can_be_deleted() {
        $this->withoutExceptionHandling();
        $this->post('/products', $this->attributes());
        $this->assertCount(1, Product::all());
        $product = Product::first();
//        dd($product);
        $response = $this->delete('/products/' . $product->id);
        $this->assertCount(0, Product::all());
        $response->assertRedirect('/products');
    }

    /** @test */
    public function product_can_be_updated() {
        $this->withoutExceptionHandling();
        $response = $this->post('/products', $this->attributes());
        $product = Product::first();
        $response = $this->patch('/products/'.$product->id, [
            'name' => 'Second name',
            'description' => 'Second product description',
        ]);
        $updatedProduct = Product::first();
        $this->assertEquals('Second name', $updatedProduct->name);
        $this->assertEquals('Second product description', $updatedProduct->description);
        $response->assertRedirect('/products/' . $product->id);
    }
    
   }
