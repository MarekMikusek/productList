<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Price;

class PriceTest extends TestCase
{
    use RefreshDatabase;
    
    /**  @test */
    public function price_can_be_added()
    {
        Price::create([
            'product_id' =>1,
            'name'=> 'regular',
            'value'=>1,
        ]);
        $this->assertCount(1,Price::all());
    }
}
