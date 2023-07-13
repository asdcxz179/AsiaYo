<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CurrencyTest extends TestCase
{
    // /**
    //  * A basic feature test example.
    //  *
    //  * @return void
    //  */
    // public function test_example()
    // {
    //     $response = $this->get('/api/currency');

    //     $response->assertStatus(422)->assertJson();
    // }

    public function testErrorResponseIsJson(){
        $response = $this->get('/api/currency');

        $response->assertStatus(422)->assertHeader('Content-Type', 'application/json');
    }

    public function testResponseIsJson(){
        $response = $this->get('/api/currency?'.http_build_query([
            'source'    =>  'USD',
            'target'    =>  'JPY',
            'amount'    =>  '$1,525',
        ]));

        $response->assertStatus(200)->assertHeader('Content-Type', 'application/json');
    }

    
}
