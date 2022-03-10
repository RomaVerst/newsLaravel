<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use File;
use App\News;

class MyFirstTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMainPageStatus()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testAdminPageStatus()
    {
        $response = $this->get('/admin');

        $response->assertStatus(200);
    }
    public function testArray()
    {
        $this->assertIsArray(News::getNews());
    }
}
