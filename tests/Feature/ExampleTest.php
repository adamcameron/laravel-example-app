<?php

namespace adamCameron\laravelExampleApp\tests\Feature;

use adamCameron\laravelExampleApp\tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * @testDox It should return 200OK from a GET request to /
     * @coversNothing
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
