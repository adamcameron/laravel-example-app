<?php

namespace adamCameron\laravelExampleApp\tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use adamCameron\laravelExampleApp\tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
