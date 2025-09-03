<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Hometest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_home(){
        $response = $this->get('/home');
        $response->assertStatus(200);
    }
    public function testBody(){
        $response = $this->get('/home');
        $response->assertSeeText('Home');
    }
}
