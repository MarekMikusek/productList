<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Price;

class PriceTest extends TestCase {

    use RefreshDatabase;

    private function attributes() {
        return [
            'product_id' => 1,
            'name' => 'regular',
            'value' => 1.22
        ];
    }

    private function setPrice() {
        return $this->post('/prices', $this->attributes());
        ;
    }

    /** @test */
    public function price_can_be_added() {
//        $this->withoutExceptionHandling();

        $response = $this->setPrice();
        $this->assertCount(1, Price::all());
        $response->assertRedirect('/prices/1');
    }

    /** @test */
    public function price_can_be_updated() {
        $this->withoutExceptionHandling();

        $this->setPrice();
        $this->assertCount(1, Price::all());
        $price = Price::first();
        $request = $this->patch('/prices/' . $price->id, [
            'product_id' => $price->product_id,
            'name' => 'new name',
            'value' => 2.44
        ]);
        $updated = Price::first();
        $this->assertEquals('new name', $updated->name);
        $this->assertEquals(2.44, $updated->value);
        $request->assertRedirect($updated->path());
    }

    /** @test */
    public function price_can_be_deleted() {
        $this->withoutExceptionHandling();

        $this->setPrice();
        $price = Price::first();
        $request = $this->delete('/prices/' . $price->id);
        $this->assertCount(0, Price::all());
        $request->assertRedirect('/products/' . $price->product_id);
    }

}
