<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
  use RefreshDatabase;
  
  public function test_the_application_redirects_to_products_index(): void
{
    $response = $this->get('/');
    $response->assertStatus(302);
    $response->assertRedirect(route('products.index'));
}

public function test_products_index_returns_successful_response(): void
{
    $response = $this->get(route('products.index'));
    $response->assertStatus(200);

}

}
